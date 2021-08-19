<?php

    class IssueModel extends Model
    {
        public $table = 'issues';


        public function getByUser($userId)
        {
            $this->db->query(
                "SELECT * , 
                    CASE 
                        WHEN developer_id = '{$userId}' THEN 'developer'
                        WHEN tester_id = '{$userId}' THEN 'tester'
                    END AS role

                    FROM {$this->table}
                    WHERE tester_id = '{$userId}'
                    OR developer_id = '{$userId}'
                    
                    ORDER BY id desc "
            );

            return $this->db->resultSet();
        }
        public function getComplete($id)
        {
            $issue = parent::get($id);

            if(!$issue){
                $this->addError("Issue does not exists");
                return false;
            }

            $userModel = model('UserModel');
            $projectModel = model('ProjectModel');
            $cyleModel = model('IssueCycleModel');

            $developer = null;
            $tester = null;

            if( !is_null($issue->developer_id) )
                $developer = $userModel->get( $issue->developer_id );

            if( !is_null($issue->tester_id) )
                $tester = $userModel->get( $issue->tester_id );
            
            $issue->developer = $developer;
            $issue->tester = $tester;

            $issue->project = $projectModel->get( $issue->project_id );
            
            $issue->cycles = $cyleModel->getByIssueWithTester($issue->id);
            
            return $issue;
        }

        public function create($issue)
        {
            extract($issue);

            $issueNumber = $this->createIssueNumber();

            $issue['issue_number'] = $issueNumber;

            $res = parent::store($issue);

            if( !$res ) {
                $this->addError("Creating issue failed!");
                return false;
            }

            $this->addMessage("Issue Created successfully.");
            return $res;
        }
        
        public function getByProject($projectId)
        {
            return parent::all([
                'project_id' => $projectId
            ], 'id desc');
        }

        public function createIssueNumber()
        {
            $issueNumber = null;

            while(is_null($issueNumber)) 
            {
                $issueNumber = get_token_random_char();

                $isExist = $this->getByIssueNumber($issueNumber);

                if($isExist)
                    $issueNumber = null;
            }

            return $issueNumber;
        }

        public function getByIssueNumber($issueNumber)
        {
            return parent::single([
                'issue_number' => $issueNumber
            ]);
        }

        public function report()
        {
            $retVal = [
                'failedLists' => [],
                'passedLists' => []
            ];
            

            $issues = $this->db->query(
                "SELECT * , ifnull(issue_c.total_cycle , 0) as total_cycle
                    FROM {$this->table} as issue 
                    LEFT JOIN 
                    (SELECT count(id) as total_cycle , issue_id
                        FROM issue_cycles as issue_c) as issue_c 
                    ON issue_c.issue_id = issue.id
                "
            );

            $issues = $this->db->resultSet();

            foreach($issues as $issue) 
            {
                if( isEqual($issue->grade , 'failed') ) {
                    $retVal['failedLists'][] = $issue;
                }

                if( isEqual($issue->grade , 'passed') ) {
                    $retVal['passedLists'][] = $issue;
                }
            }

            return $retVal;
        }
    }