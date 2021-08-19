<?php

    class IssueController extends Controller
    {   

        public function __construct()
        {
            $this->issue = model('IssueModel');

            $this->auth = whoIs();   
        }

        public function index()
        {
            $issues = $this->issue->getByUser($this->auth->id);

            $data = [
                'issues' => $issues,
                'title'  => 'Issues'
            ];

            return $this->view('issue/index' , $data);
        }
        public function create()
        {   
            if( isSubmitted() )
            {
                $post = request()->posts();

                $res = $this->issue->create($post);

                if(!$res){
                    Flash::set( $this->issue->getErrorString() );
                    return request()->return();
                }

                Flash::set( $this->issue->getMessageString() );
                
                return redirect( _route('issue:show' , $res));
            }

            $this->project = model('ProjectModel');
            $this->user    = model('UserModel');

            $projects = $this->project->getByCreator($this->auth->id);
            $projects = arr_layout_keypair($projects, ['id' , 'project']);

            $users = $this->user->all(null , 'first_name asc');
            $users = arr_layout_keypair($users , ['id' , 'first_name@email']);

            $projectSelected = false;

            $data = [
                'projects' => $projects,
                'projectSelected' => $projectSelected,
                'users' => $users
            ];

            

            if( isset($_GET['project']) )
            {
                $project = $this->project->get($_GET['project']);

                if($project){
                    $data['project'] = $project;
                    $data['projectSelected'] = true;
                }
                    
            }

            return $this->view('issue/create' , $data);
        }

        public function show($id)
        {
            $issue = $this->issue->getComplete($id);

            $data = [
                'issue' => $issue,
                'developer' => $issue->developer,
                'tester' => $issue->tester,
                'cycles' => $issue->cycles
            ];

            return $this->view('issue/show' , $data);
        }
    }