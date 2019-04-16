<?php 
    class CommentForUser {
        private $name;
        private $msg;
        private $hide;
        private $puttime;

        public function __construct(string $name, string $msg, bool $hide, string $puttime) {
            $this->name = $name;
            $this->msg = $msg;
            $this->hide = $hide;            
            $this->puttime = $puttime;
        }

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>