<?php

class Book{

    public int $maxQuantity;

    public function __construct(
        public string $title,
        private string $autor,
        private int $year,
        private int $price,
        public int $quantity
        
        
    ){
         $this->maxQuantity = $quantity;
    }


    public function opis(): void {
        echo "Книга {$this->title} от автора {$this->autor} написана в {$this->year} году и стоит {$this->price}";
}
}

?>