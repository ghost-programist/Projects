
<?php

require_once "classes/Book.php";
require_once "classes/User.php";
require_once "classes/payMethod.php";

session_start();


//создание пользователей
$admin = new Admin(
    "Alex",
    "admin@mail.com",
    "12345"
);

$customer = new Customer(
    "Ivan",
    "ivan@mail.com",
    "12345",
    "Warsaw"
);

//создание книг
if(!isset(($_SESSION["books"]))){
    $_SESSION["books"] = [
        new Book("Rozdroże kruków", "Andrzej Sapkowski", 2024, 40),
        new Book("Atomowe nawyki", "James Clear", 2019, 29),
        new Book("Teoria. Pozwól im", "Mel Robbins", 2024, 33),
        new Book("Schroniskowe łamigłówki", "Sławek Gortych", 2020, 37),
        new Book("Bezprawie", "Remigiusz Mróz", 1974, 20)
    ];

}
$books = $_SESSION["books"];



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Store</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<!-- форма выбора книги -->
    <form method="POST">

    <label for="selectBook">Выбери книгу</label><br>
    <select name="book" id="selectBook">
    <?php foreach ($books as $book): ?>
        <option value="<?= htmlspecialchars($book->title) ?>">
            <?= htmlspecialchars($book->title) ?>
        </option>
    <?php endforeach; ?>
</select><br>

 <button type="submit" name="action" value="take">
        Купить книгу
    </button>

    <button type="submit" name="action" value="return">
        Вернуть книгу
    </button>

    <button type="submit" name="action" value="description">
        Описание книги
    </button>


</form>
<?php if ( isset($_POST["book"], $_POST["action"]) && $_SERVER["REQUEST_METHOD"] === "POST"): ?>
        
        <?php
        $title_book = $_POST["book"];
        $action = $_POST["action"];
        $selectedBook = null;

        foreach ($books as $book){
            if($book->title === $title_book){ 
                $selectedBook = $book;
                break;
            }
        }
        //выбор действия и действие
            if ($selectedBook === null) {
                echo "Книга не найдена!";
            } else {
            
            
           if ($action === "take") {

            if ($selectedBook->isAvailable) {
                $selectedBook->isAvailable = false;
                echo "Вы взяли книгу {$selectedBook->title}";
            }else {
                echo "Книга уже недоступна!";
            }

            } 
        
        elseif ($action === "return") {

            if (!$selectedBook->isAvailable) {
                $selectedBook->isAvailable = true;
                echo "Вы вернули книгу {$selectedBook->title}";
            } else {
                echo "Книга уже находится в библиотеке!";
            }

        } 
        
        elseif ($action === "description") {

            $selectedBook->opis();

        }
        else {
            echo "Неизвестное действие!";
        }
        }
        ?>
        </div>
        <?php endif; ?>
    

</body>
</html>