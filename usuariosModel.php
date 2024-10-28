<?php 

//Crear esa clase base que servirá como nuestro modelo para la API

class usuariosModel{


    //Se instancian atributos

private static $db;

/// creamos los metodos para instanciar los datos en la API

private static function ConectarDB(){

        if(!self::$db){

                $config = require('./config.php');
                $dns = 'mysql:host='. $config['host'] . ';dbname=' . $config['dbname'];
                self::$db = new PDO($dns,$config['user'],$config['password']);
                self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }


}

//crear metodo para buscar usuarios 

public static function Buscarusuarios(){

    self::ConectarDB();

    $stmt = self::$db->query('SELECT * FROM usuarios');

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//crear metodo para buscar usuarios por su id_usuario

public static function BuscarIdusuarios($id){

    self::ConectarDB();

    $stmt = self::$db->prepare('SELECT * FROM usuarios WHERE id_usuario = :id');
    $stmt->execute(['id' => $id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





}