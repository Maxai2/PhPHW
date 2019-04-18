<?php 
    class User {
        private $login;
        private $password;
        private $FIO;
        private $gender;
        private $langsName;
        private $areasOfActivity;
        private $email;
        private $additionalInfo;

        public function __construct(string $login, string $password, string $FIO, string $gender, string $langsName, string $areasOfActivity, string $email, string $additionalInfo) {
            $this->login = $login;
            $this->password = $password;
            $this->FIO = $FIO;
            $this->gender = $gender;
            $this->langsName = $langsName;
            $this->areasOfActivity = $areasOfActivity;
            $this->email = $email;
            $this->additionalInfo = $additionalInfo;
        }
    }
?>