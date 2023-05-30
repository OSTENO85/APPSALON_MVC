<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Restablece tu password escribiendo tu email</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";//dir hace referencia al archivo actual
?>

<form class="formulario" action="/olvide" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="tu Email">
    </div>

    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes cuenta? Inicia Sesion</a>
    <a href="/crear-cuenta">¿Aún no tienes cuenta? Crear Una</a>
</div>