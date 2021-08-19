<?php

    class IssueCycleModel extends Model
    {
        public $table = 'issue_cycles';

        public function create($cycle)
        {
            //check if issue is valid

            extract($cycle);


            if( !$tester_id)
            {
                $this->addError("Tester must not be empty!");
                return false;
            }
            $issueModel = model('IssueModel');

            $issue = $issueModel->get($issue_id);

            if(!$issue){
                $this->addError("Issue not found");
                return false;
            }

            $cycle['cycle_number'] = $this->createCycleNumber();

            $res = parent::store($cycle);

            if(!$res){
                $this->addError("Create cyle failed!");
                return false;
            }

            if( isEqual($grade , 'passed')) {
                
                $issueModel->update([
                    'status' => 'completed',
                    'grade'  => 'passed'
                ], $issue->id);
            }

            $this->addMessage("Issue Created!");

            return $res;
        }

        public function createCycleNumber()
        {
            $number = null;

            while( is_null($number) )
            {
                $number = get_token_random_char();

                $isExist = $this->getByCyleNumber($number);

                if($isExist)
                    $number = null;
            }

            return $number;
        }

        public function getByCyleNumber($number)
        {
            return parent::single([
                'cycle_number' => $number
            ]);
        }

        public function getByIssueWithTester($issueId)
        {
            $cycles = parent::all(['issue_id' => $issueId] , 'id desc');

            if(!$cycles)
            {
                $this->addError("No Cycles found");
                return false;
            }
            
            $userModel = model('UserModel');

            foreach($cycles as $cyle){
                $cyle->tester = $userModel->get($cyle->tester_id);
            }

            return $cycles;
        }
    }