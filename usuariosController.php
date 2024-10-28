<?php

// crear el controlador
class usuariosController{

// Método que me muestra todos los usuarios

        public function MostrarUsuarios(){

            $usuarios = usuariosModel::Buscarusuarios();

            if(!$usuarios){

                http_response_code(404);
                echo json_encode(['mensaje' => 'No hay datos para la DB solicitada']);
                return;

            
            }else{

                echo json_encode($usuarios);
            }


        }

// Método que me muestra todos los usuarios

public function MostrarUsuariosId($id){

    $usuarios = usuariosModel::BuscarIdusuarios($id);

    if(!$usuarios){

        http_response_code(404);
        echo json_encode(['mensaje' => 'No se encontró el usuarios solicitado, ERROR 404']);
        return;

    
    }else{

        echo json_encode($usuarios);
    }


}



}