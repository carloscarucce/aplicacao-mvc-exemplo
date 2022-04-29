<?php include __DIR__.'/../base/topo.php' ?>

<?php if ($mensagem) { ?>
    <p style="color: green">
        <?php echo $mensagem ?>
    </p>
<?php } ?>


<form action="/?controller=UsuarioController&metodo=salvar" method="post">
    <input type="hidden" name="id" value="<?php echo $usuario->id ?>"/>

    <label>Nome</label><br/>
    <input type="text" name="nome" value="<?php echo $usuario->nome; ?>"/><br/><br/>


    <label>Email</label><br/>
    <input type="text" name="email" value="<?php echo $usuario->email; ?>"/><br/><br/>


    <label>Senha</label><br/>
    <input type="text" name="password" value="<?php echo $usuario->password; ?>"/><br/>

    <br/>
    <br/>
    <a href="/?controller=UsuarioController&metodo=index">
        Voltar à lista
    </a>
    <button type="submit">
        Salvar
    </button>
</form>

<?php include __DIR__.'/../base/rodape.php' ?>