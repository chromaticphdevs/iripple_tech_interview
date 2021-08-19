<?php

    class ProjectModel extends Model
    {
        public $table = 'projects';

        public function create($projectData)
        {
            extract($projectData);

            $isCodeExists = $this->getByCode($code);

            if($isCodeExists){
                $this->addError("Project code exists.");
                return false;
            }

            $this->addMessage("Project has been creataed!");

            $projectData['created_by'] = whoIs('id');

            return parent::store($projectData);
        }

        public function getByCode($code)
        {
            return parent::single([
                'code' => $code
            ]);
        }

        public function getWithIssues($id)
        {
            $project = parent::get($id);

            if(!$project){
                $this->addError("No project found.");
                return false;
            }

            $issueModel = model('IssueModel');

            $issues = $issueModel->getByProject($id);

            if($issues) {
                $this->user = model('UserModel');

                foreach($issues as $issue) 
                {
                    $developer = null;
                    $tester    = null;
                    
                    if( $issue->developer_id )
                        $developer = $this->user->get($issue->developer_id);
                    if( $issue->tester_id )
                        $tester = $this->user->get($issue->tester_id);

                    $issue->developer = $developer;
                    $issue->tester = $tester;
                }
            }

            $project->issues = $issues;

            return $project;
        }

        public function getByCreator($userId)
        {
            return parent::all([
                'created_by' => $userId
            ]);
        }
    }