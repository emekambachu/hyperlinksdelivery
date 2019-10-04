<?php

    class Admin_session{

        private $signedIn = false;
        public $adminId;

        function __construct(){
            if(!isset($_SESSION)){
                session_start();
            }
            $this->checkTheLogin();
        }

        public function isSignedIn(){
            return $this->signedIn;
        }

        public function login($admin){
            if($admin){
                $this->adminId = $_SESSION['admin_id'] = $admin->id;
                $this->signedIn = true;
            }
        }

        public function logout(){

            unset($_SESSION['admin_id']);
            unset($this->adminId);
            $this->signedIn = false;

        }

        private function checkTheLogin(){
            if(isset($_SESSION['admin_id'])){
                $this->adminId = $_SESSION['admin_id'];
                $this->signedIn = true;
            }else{
                unset($this->adminId);
                $this->signedIn = false;
            }
        }

    }

$adminSession = new Admin_session();

?>