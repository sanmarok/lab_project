<?php
    class RegisterUser{
        private $username;
        private $raw_password;
        private $encrypted_password;

        public $error;
        public $success;

        private $storage = "../users.json";

        private $stored_users;

        private $new_user;

        private $email;
        private $name;
        private $lastname;


        public function __construct($name,$lastname,$username,$email,$password)
        {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->username = trim($username);
            $this->username = trim(filter_var($username,FILTER_SANITIZE_STRING));
            $this->email = $email;
            $this->raw_password = filter_var(trim($password),FILTER_SANITIZE_STRING);
            $this->encrypted_password = password_hash($this->raw_password,PASSWORD_DEFAULT);

            $this->stored_users = json_decode(file_get_contents($this->storage),true); 

            $this->new_user = [
                "username" => $this->username,
                "password" => $this->encrypted_password,
                "name" => $this->name,
                "lastname" => $this->lastname,
                "email" => $this->email,
            ];

            if($this->checkFieldValues()){
                $this->insertUser();
            }
        }

        private function checkFieldValues(){
            if(empty($this->username)|| empty($this->raw_password) || empty($this->name) || empty($this->lastname) || empty($this->email)){
                $this->error = '<h1 class="register_error_sm">Hay campos sin llenar</h1>
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                            changeformtoregister();
                        });
                </script>';
                return false;
            }else{
                return true;
            }
        }

        private function usernameExists(){
            foreach($this->stored_users as $user){
                if(($this->username) == $user['username']){
                    $this->error = '<h1 class="register_error_sm">Elija otro nombre de usuario</h1>
                    <script>
                        document.addEventListener("DOMContentLoaded", function(event) {
                                changeformtoregister();
                            });
                    </script>';
                    return true;
                }
            }
            return false;
        }

        private function insertUser(){
            if($this->usernameExists() == FALSE){
                array_push($this->stored_users,$this->new_user);

                if(file_put_contents($this->storage,json_encode($this->stored_users,JSON_PRETTY_PRINT))){
                    return $this->success = '<h1 class=".register_success_sm">Tu registro fue exitoso</h1>
                    <script>
                        document.addEventListener("DOMContentLoaded", function(event) {
                                alert("Registro exitoso");
                            });
                    </script>';
                }else{
                    return $this->error = '<h1 class="register_error_sm">Tu registro no pudo completarse, intente nuevamente</h1>
                    <script>
                        document.addEventListener("DOMContentLoaded", function(event) {
                                changeformtoregister();
                            });
                    </script>';
                }
            }
        }

    }
?>