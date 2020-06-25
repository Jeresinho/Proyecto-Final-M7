<?php

    include 'conexionBD.php';
    CrearUsuarios("Jere","1995/07/16","mjm@gmial.com","321546");
    CrearUsuarios("Marian J","1996/05/16","marianj@gmial.com","321546");
    CrearUsuarios("Juancho L","1994/01/16","juanchol@gmial.com","321546");

    function CrearUsuarios($Nombre,$FechaNacimiento,$UserName,$Password){
    IniciarConexion();
    $Consulta="Select * from usuario where Username='".$UserName."'";
    $Resultado= mysqli_num_rows($GLOBALS['Conexion']->query($Consulta));
    if($Resultado==0){
        $Consulta = "INSERT INTO usuario (Nombre, FechaNacimiento, Username, Password)
        VALUES ('".$Nombre."', '".$FechaNacimiento."', '".$UserName."', '".password_hash($Password, PASSWORD_BCRYPT)."')";

        if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $GLOBALS['Conexion']->error;
        }
    }
    DesactivarConexion();
    }
 ?>
