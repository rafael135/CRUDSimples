<?php
    require "../../vendor/autoload.php";

    use Entities\UserDaoMySql;

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    if($nome && $email) {
        $nome = ucwords(trim($nome));
        $email = strtolower($email);

        $userDAO = new UserDaoMySql();
        $result = $userDAO->insertUser($nome, $email);

        header("Location: ../../index.php");
        exit;
    } else {
        header("Location: ../../adicionar.php");
        exit;
    }
?>