<?php

    class UserController extends Controller
    {
        public function __construct()
        {
            $this->user = model('UserModel');   
        }

        public function index()
        {
            if( whoIs('id') )
                return $this->login();
                
            $users = $this->user->dbgetAssoc('first_name');

            $data = [
                'users' => $users
            ];

            return $this->view('user/index' , $data);
        }
        public function create()
        {
            if( isSubmitted() )
            {
                $post = request()->posts();

                $res = $this->user->create($post);

                if(!$res) {
                    Flash::set( $this->user->getErrorString() , 'danger');
                    return request()->return();
                }
                Flash::set( $this->user->getMessageString() );

                return redirect( _route('user:index'));
            }

            $data = [
                'title' => 'Register User'
            ];

            return $this->view('user/create' , $data);
        }

        public function edit($id)
        {
            $user = $this->user->get($id);

            $data = [
                'title' => 'Edit User',
                'user'  => $user
            ];

            return $this->view('user/edit' , $data);
        }


        public function editEmail()
        {
            if( isSubmitted() )
            {
                $post = request()->posts();

                $res = $this->user->updateEmail($post['email'] , $post['id']);

                Flash::set( $this->user->getMessageString() );

                if(!$res) 
                    Flash::set( $this->user->getErrorString() );

                return request()->return();
            }
        }

        public function editPassword()
        {
            if( isSubmitted() )
            {
                $post = request()->posts();
                
                $res = $this->user->updatePassword($post['password'] , $post['id']);

                Flash::set( $this->user->getMessageString() );

                if(!$res) 
                    Flash::set( $this->user->getErrorString() );

                return request()->return();
            }
        }

        // public function show($id)
        // {
        //     $user = $this->user->get($id);

        //     $data = [

        //     ];
        //     return $this->view('user/show' , $data);
        // }

        public function login()
        {
            if( isSubmitted() )
            {
                $post = request()->posts();

                $user = $this->user->authenticate($post['email'] , $post['password']);

                if(!$user) {
                    Flash::set( $this->user->getErrorString() , 'danger');
                    return request()->return();
                }

                Flash::set( $this->user->getMessageString() );

                return redirect( _route('dashboard:index') );
            }

            return $this->view('user/login');
        }

        public function logout()
        {
            session_destroy();

            Flash::set("logged out successfully");

            return redirect( _route('user:login') );
        }
    }