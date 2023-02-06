<?php 
    require "vendor/autoload.php";

    use Entities\UserDAO;

    $userDAO = new UserDAO();
    $usuarios = $userDAO->getUsers();

    require_once "src/menus/header.php";
?>

<body>
<div class="container-fluid d-flex py-3 px-4 justify-content-center align-content-center">
    <a class="btn btn-success w-100" href="adicionar.php">Adicionar Novo Usuário</a>
</div>

<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
        <?php
        if($usuarios != false) {
            foreach($usuarios as $usuario): ?>
        <tr>
            <td class="align-middle"><?php echo $usuario->getId(); ?></td>
            <td class="align-middle"><?php echo $usuario->getName(); ?></td>
            <td class="align-middle"><?php echo $usuario->getEmail(); ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-secondary" href="editar.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
                    <a class="btn btn-danger" href="excluir.php?id=<?php echo $usuario->getId(); ?>">Excluir</a>
                </div>
            </td>
        </tr>
            <?php
            endforeach;
        }
        ?>
    </table>
</div>

<?php
    require_once "src/menus/footer.php";
?>