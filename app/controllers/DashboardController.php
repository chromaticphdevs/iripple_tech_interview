<?php

    class DashboardController extends Controller
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
                'projects' => $projects
            ];
            
            return $this->view('dashboard/index' , $data);
        }
    }