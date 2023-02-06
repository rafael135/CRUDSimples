<?php 
    require "vendor/autoload.php";

    use Entities\UserDaoMySql;
    use Entities\User;

    $id = filter_input(INPUT_GET, "id");

    $user;

    if($id) {
        $usrDao = new UserDaoMySql();
        $user = $usrDao->getUserById($id);
    } else {
        header("Location: index.php");
        exit;
    }
    
    require_once "src/menus/header.php";


?>

<body>
    <div class="container-fluid h-100 d-flex justify-content-center align-items-center">
        <form class="form-control d-flex flex-column justify-content-evenly form-adicionar m-0" id="form" method="POST" action="src/actions/editar_action.php">
            <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"/>
            <h1 class="text-center">Editar Usuário</h1>
            <div class="input-group has-validation">
                <!--<span class="input-group-text">Nome</span>-->
                <div class="form-floating">
                    <input type="text" class="form-control" value="<?php echo $user->getName(); ?>" name="nome" id="nome" data-requirements="required" placeholder="Nome">
                    <label for="nome">Nome</label>
                </div>
            </div>

            <div class="input-group has-validation">
                <!--<span class="input-group-text">Email</span>-->
                <div class="form-floating">
                    <input type="text" class="form-control" name="email" value="<?php echo $user->getEmail(); ?>" id="email" data-requirements="required" placeholder="Email">
                    <label for="email">Email</label>
                </div>
            </div>

            <input class="btn btn-success" type="submit" value="Confirmar" onclick="return confirm('Tem certeza que quer editar o usuário?');"/>
        </form>
    </div>


    <script src="src/js/formValidation.js"></script>
<?php
    require_once "src/menus/footer.php";
?>