<?php 

    class QueryException extends Exception {
        public $msg;

        public function __construct(string $msg) {
            $this->msg = $msg;
        }

    }

?>