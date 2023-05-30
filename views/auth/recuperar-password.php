<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuacion</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";//dir hace referencia al archivo actual
?>

<?php
if ($error) return;
?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="tu nuevo password">

    </div>
    <input type="submit" class="boton" value="Guardar nuevo password">

    <div class="acciones">
        <a href="/">Ya tienes una cuenta? Iniciar sesion</a>
        <a href="/crear-cuenta">Aun no tienes cuenta? Crear una</a>
    </div>
</form>