<?php 
    require "vendor/autoload.php";

    use Entities\User;


    $usuarios = User::getUsers();

    require_once "src/menus/header.php";
?>

<body>

<div class="container">
    <table class="table table-striped table-hover">
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
            <td class="align-middle"><?php echo $usuario["id"]; ?></td>
            <td class="align-middle"><?php echo $usuario["nome"]; ?></td>
            <td class="align-middle"><?php echo $usuario["email"]; ?></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-secondary" href="editar.php?id=<?php echo $usuario["id"]; ?>">Editar</a>
                    <a class="btn btn-danger" href="excluir.php?id=<?php echo $usuario["id"]; ?>">Excluir</a>
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