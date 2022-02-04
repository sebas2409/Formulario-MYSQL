<?php

class Conexion
{
    public function gestion(){
        $conexion = mysqli_connect("localhost","root","","test2");
        $consulta = "INSERT INTO publicaciones(titulo,descripcion,autor,fecha_publicacion) VALUES(?,?,?,?)";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->bind_param("ssss",$titulo,$descripcion,$autor,$fecha);
        $autor=$_POST['autor'];
        $titulo=$_POST['titulo'];
        $descripcion=$_POST['descripcion'];
        $fecha = date("Y-m-d",mktime(0,0,0,10,10,2020));
        $sentencia->execute();
    }

    public function mostrarDatos(){
        $conexion = mysqli_connect("localhost","root","","test2");
        $consulta_select = "SELECT * FROM publicaciones";
        $resultado = mysqli_query($conexion,$consulta_select);
        while($fila = mysqli_fetch_row($resultado)){
            printf("<p>id: $fila[0]-Titulo: $fila[1]-Autor: $fila[2]-Descripcion: $fila[3]-Fecha de Publicacion: $fila[4] </p>");
        }
    }

}