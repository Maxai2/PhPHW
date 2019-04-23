<?php
    class User {
        public $login;
        public $password;
        public $email;
        
        function __construct(string $login, string $password, string $email) {
            $this->login = $login;
            $this->password = $password;
            $this->email = $email;
        }
    }
?>