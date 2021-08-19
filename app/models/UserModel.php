<?php

    class UserModel extends Model
    {
        public $table = 'users';

        public function create($user)
        {
            extract($user);
            //checks 
            if( strlen($first_name) < 1) 
                $this->addError("First name must atleast containt 2 characters long");

            if( strlen($last_name) < 1) 
                $this->addError("Last name must atleast containt 2 characters long");
            
            $this->validateEmail($email);

            //check if has errors
            if( !empty( $this->getErrors() ))
                return false;
            
            $password = password_hash($password , PASSWORD_ARGON2I);

            $userId = parent::store([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => $password
            ]);

            if(!$userId){
                $this->addError("Create user failed!");
                return false;
            }

            $this->addMessage("User {$firstname} has been created!");

            return $userId;
        }

        public function getByEmail($email)
        {
            return parent::single([
                'email' => $email
            ]);
        }

        public function updatePassword($password , $id)
        {
            if( strlen($password) < 4) {
                $this->addError("Password must atleast containt 4 characters long ");
                return false;
            }

            $this->addMessage("Password update successful");

            return parent::update([
                'password' => password_hash($password , PASSWORD_ARGON2I)
            ] , $id);
        }

        public function updateEmail($email , $id)
        {
            if (! $this->validateEmail($email))
                return false;

            //send email validation

            $this->addMessage("Email update successful");

            return parent::update([
                'email' => $email
            ] , $id);
        }

        private function validateEmail($email)
        {
            $retVal = true;

            if( is_email($email) )
            {
                $isExist = $this->getByEmail($email);
                if($isExist){
                    $this->addError("Email {$email} is already used try another one.");
                    $retVal = false;
                }
            }else{
                $this->addError("Make sure that your email is valid.");
                $retVal = false;
            }
            return $retVal;
        }

        public function authenticate($key , $secret)
        {
            $user = parent::single([
                'email' => $key
            ]);

            if(!$user){
                $this->addError("User doest not exist.");
                return false;
            }

            if( !password_verify($secret , $user->password) )
            {
                $this->addError("Incorrect Password");
                return false;
            }

            $this->addMessage("Welcome back {$user->first_name}");

            return $this->restartSession($user->id);
        }

        public function restartSession($userId)
        {
            $user = parent::get($userId);

            Session::set('auth' , $user);

            $user = Session::get('auth');

            return $user;
        }
    }