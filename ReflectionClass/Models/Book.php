<?php 
    class Book {
        public $id;
        public $title;
        public $author;
        public $year;
        
        function __construct(string $title, string $author, string $year) {
            $this->title = $title;
            $this->author = $author;
            $this->year = $year;
        }
    }
?>