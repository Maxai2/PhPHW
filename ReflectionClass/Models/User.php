<?php
    class User {
        public $id;
        public $login;
        public $password;
        public $email;
        
        function __construct(string $login, int $password, string $email) {
            $this->login = $login;
            $this->password = $password;
            $this->email = $email;
        }
    }
?>