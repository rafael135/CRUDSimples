<?php 
    require "vendor/autoload.php";

    require_once "src/menus/header.php";
?>

<body>
    <div class="container-fluid h-100 d-flex justify-content-center align-items-center">
        <form class="form-control d-flex flex-column justify-content-evenly form-adicionar m-0" id="form" method="POST" action="src/actions/adicionar_action.php">
            <h1 class="text-center">Adicionar Usuário</h1>
            <div class="input-group has-validation">
                <!--<span class="input-group-text">Nome</span>-->
                <div class="form-floating">
                    <input type="text" class="form-control" name="nome" id="nome" data-requirements="required" placeholder="Nome">
                    <label for="nome">Nome</label>
                </div>
            </div>

            <div class="input-group has-validation">
                <!--<span class="input-group-text">Email</span>-->
                <div class="form-floating">
                    <input type="text" class="form-control" name="email" id="email" data-requirements="required" placeholder="Email">
                    <label for="email">Email</label>
                </div>
            </div>

            <input class="btn btn-success" type="submit" value="Adicionar Usuário"/>
        </form>
    </div>


    <script src="src/js/formValidation.js"></script>
<?php
    require_once "src/menus/footer.php";
?>