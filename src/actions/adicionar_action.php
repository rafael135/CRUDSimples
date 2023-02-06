<?php
    require "../../vendor/autoload.php";

    use Entities\UserDAO;

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    if($nome && $email) {
        $userDAO = new UserDAO();
        $result = $userDAO->insertUser($nome, $email);

        header("Location: ../../index.php");

    } else {
        header("Location: ../../adicionar.php");
    }

    
    exit;

?>