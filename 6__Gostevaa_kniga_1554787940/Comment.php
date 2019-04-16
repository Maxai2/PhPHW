<?php 
    class Comment {
        private $id_msg;
        private $name;
        private $city;
        private $email;
        private $url;
        private $msg;
        private $answer;
        private $puttime;
        private $hide;

        public function __construct(string $name, string $city, string $email, string $url, string $msg) {
            $this->name = $name;
            $this->city = $city;
            $this->email = $email;
            $this->url = $url;
            $this->msg = $msg;
            $this->answer = '';
            $this->hide = false;            
            $this->puttime = date("d/m/Y H:i:s");
        }

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>