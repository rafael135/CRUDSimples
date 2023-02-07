<?php
    require "../../vendor/autoload.php";

    use Entities\UserDaoMySql;
    use Entities\User;

    $usrDao = new UserDaoMySql();

    $id = filter_input(INPUT_POST, "id");
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    if($id && $nome && $email) {
        $nome = ucwords(trim($nome));
        $email = strtolower($email);

        $user = new User($id, $nome, $email);
        $resultado = $usrDao->editUserById($user);
        
        header("Location: ../../index.php");
        exit;

    } else {
        header("Location: ../../index.php");
        exit;
    }
?>