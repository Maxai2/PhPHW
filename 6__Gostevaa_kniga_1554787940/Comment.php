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

        static function makeCommentForAdmin(string $name, string $city, string $email, string $url, string $msg, string $answer = '', bool $hide = false, string $puttime = '') {
            $comment = new Comment;

            $comment->name = $name;
            $comment->city = $city;
            $comment->email = $email;
            $comment->url = $url;
            $comment->msg = $msg;
            $comment->answer = $answer;
            $comment->hide = $hide;            
            $comment->puttime = $puttime == '' ? date("d/m/Y H:i:s") : $puttime;

            return $comment;
        }

        static function makeCommentForUser(string $name, string $msg, bool $hide, string $puttime) {
            $comment = new Comment;

            $comment->name = $name;
            $comment->msg = $msg;
            $comment->hide = $hide;            
            $comment->puttime = $puttime;

            return $comment;
        }

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>