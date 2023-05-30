<?php
namespace model;

use Model\ActiveRecord;

class usuario extends ActiveRecord{
    //base de datos
    //donde va a encontrar los datos
    protected static $tabla = 'usuarios';

    //normalizar los datos, itera sobre registros,
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password',
    'telefono','admin', 'confirmado', 'token']; 

    //se crean atributos por cada campo de la tabla, en public para acceder a ellos en la clase-
    //misma o en el objeto una vez sea instanciado
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    //se define el constructor
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    //mensaje de validacion para la creacion de una cuenta
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El telefono es obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        if(strlen($this->password)<6){
            self::$alertas['error'][] = 'el password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'el email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'el password es obligatorio';
        }
        return self::$alertas;
    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'el email es obligatorio';
        }
        return self::$alertas;
    }


    public function ValidarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio'; 
        }
        if(strlen($this->password)< 6){
            self::$alertas['error'][] = 'El password tiene que tener al menos 6 caracteres'; 
        }    
    }

    //revisa que el usuario si exista
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][] = 'el usuario ya está registrado';
        }
        return $resultado;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password) {
        $resultado = password_verify($password, $this->password);
        
        if(!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

}