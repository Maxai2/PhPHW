<?php 
    class Picture {
        private $name;
        private $size;
        private $imagePath;

        function __construct(string $name, int $size, string $imagePath) {
            $this->name = $name;
            $this->size = $size;
            $this->imagePath = $imagePath;
        }

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }

?>