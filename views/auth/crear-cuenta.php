<h1 class="nombre-pagima">Crear cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>
<?php
include_once __DIR__ . "/../templates/alertas.php";//dir hace referencia al archivo actual

?>
<form class="formulario" method="POST" action="/crear-cuenta">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo s($usuario->nombre); ?>">
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" value="<?php echo s($usuario->apellido); ?>">
    </div>

    <div class="campo">
        <label for="telefono">telefono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Tu telefono"value="<?php echo s($usuario->telefono); ?>">
    </div>

    <div class="campo">
        <label for="email">email</label>
        <input type="email" id="email" name="email" placeholder="Tu email" value="<?php echo s($usuario->email); ?>">
    </div>

    <div class="campo">
        <label for="password">password</label>
        <input type="password" id="password" name="password" placeholder="Tu password">
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes cuenta? Crear una</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>