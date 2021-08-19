<?php

    class IssueCycleController extends Controller
    {

        public function __construct()
        {
            $this->cycle = model('IssueCycleModel');
        }
        
        public function create()
        {

            if( isSubmitted() )
            {
                $post = request()->posts();

                $res = $this->cycle->create($post);

                if(!$res) {
                    Flash::set( $this->cycle->getErrorString() , 'danger');
                    return request()->return();
                }

                Flash::set( $this->cycle->getMessageString() );

                return redirect( _route('issue:show' , $post['issue_id']) );
            }

            if( !isset($_GET['issue_id']))
                echo die("Invalid Request!!");

            $data = [
                'title' => 'Create Cycle',
                'issueId' => $_GET['issue_id'],
                'userId'  => whoIs('id')
            ];

            return $this->view('issue_cycle/create' , $data);
        }
    }