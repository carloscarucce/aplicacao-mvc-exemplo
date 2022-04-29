<?php include __DIR__.'/../base/topo.php' ?>

<!-- Conteúdo -->
<h1>Lista de usuarios</h1>

<a href="/?controller=UsuarioController&metodo=form">
    Novo usuário
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php foreach($usuarios as $usuario) { ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td>
                <a href="/?controller=UsuarioController&metodo=form&id=<?php echo $usuario['id'] ?>">
                    Editar
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include __DIR__.'/../base/rodape.php' ?>
