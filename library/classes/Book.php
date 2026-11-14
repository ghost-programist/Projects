<?php

class Book{
    public function __construct(
        public string $title,
        private string $autor,
        private int $year,
        private int $price,
        public bool $isAvailable = true
        
    ){}


    public function opis(): void {
        echo "Книга {$this->title} от автора {$this->autor} написана в {$this->year} году и стоит {$this->price}";
}
}

?>