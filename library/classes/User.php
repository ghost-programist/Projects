<?php

abstract class User{
    public function __construct(
        public string $name,
        public string $email,
        protected string $password
        
    ){}

    public function showInfo(): void {
        echo "Имя: " . $this->name;
        echo "Email: " . $this->email;
    }

}

class Customer extends User{
    public function __construct(
        string $name,
        string $email,
        string $password,
        public string $address
    ){
        parent::__construct($name, $email, $password);
    }

public function buyBook(): void {
        echo "Покупатель покупает книгу";
    }
}


class Admin extends User {

    public function addBook(): void {
        echo "Администратор добавил книгу";
    }

    public function removeBook(): void {
        echo "Администратор удалил книгу";
    }

}
?>