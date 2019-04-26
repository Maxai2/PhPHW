<?php

    namespace App\Abstractions;

    interface ITaskService {
        public function get();
        public function insert($object);
    }

?>
