<?php
    require "../../vendor/autoload.php";

    use Entities\UserDaoMySql;

    $id = filter_input(INPUT_GET, "id");

    if($id) {
        $usrDao = new UserDaoMySql();
        $resultado = $usrDao->deleteUserById($id);
    }

    header("Location: ../../index.php");
?>