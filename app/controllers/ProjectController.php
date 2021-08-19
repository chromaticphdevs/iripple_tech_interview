<?php

    class ProjectController extends Controller
    {

        public function __construct()
        {
            $this->project = model('ProjectModel');
        }

        public function index()
        {
            $user = whoIs();
            
            $projects = $this->project->getByCreator( $user->id );

            $data = [
                'projects' => $projects,
                'title'    => 'Projects'
            ];

            return $this->view('project/index' , $data);
        }
        public function create()
        {
            if( isSubmitted() )
            {
                $post = request()->posts();

                $res = $this->project->create($post);

                if(!$res) {
                    Flash::set( $this->project->getErrorString() , 'danger');
                    return request()->return();
                }

                Flash::set( $this->project->getMessageString() );

                return redirect( _route('project:show' , $res) );
            }

            $data = [
                'title' => 'Create project'
            ];

            return $this->view('project/create' , $data);
        }

        public function show($id)
        {
            $project = $this->project->getWithIssues($id);

            $data = [
                'project' => $project,
                'issues'  => $project->issues,
                'title'   => $project->project
            ];
            
            return $this->view('project/show', $data);
        }
    }