<?php 

    class QueryException extends PDOException {
        public $msg;

        public function __construct(string $msg) {
            $this->msg = $msg;
        }

    }

?>