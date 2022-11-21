<?php 
    class LoginUser{
        private $username;
        private $password;

        public $error;
        public $success;

        private $storage = "../users.json";
        private $stored_users; 

        public function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;

            $this->stored_users = json_decode(file_get_contents($this->storage),true);
            
            $this->login();
        }

        private function login(){
            foreach($this->stored_users as $user){
                if ($user['username'] == $this->username){
                    if(password_verify($this->password, $user['password'])){
                        session_start();
                        $_SESSION['user'] = $this->username;
                        header("location:profile.php"); exit();
                    }
                }
            }

            return $this->error = '<h1 class = "login_error_sm">Usuario o contraseña incorrecta</h1>';
        }
    }
?>