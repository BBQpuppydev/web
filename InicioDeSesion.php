<?php
    session_start();
    include('conexion.php');
    if (isset($_POST['Usuario']) &&  isset($_POST['Clave'])){

    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $Usuario=validate($_POST['Usuario']);
    $Clave=validate($_POST['Clave']);

    if(empty($Usuario)){
        header("Location: index.php?error=El usuario es requerido");
        exit();

    }elseif(empty($Clave)){
        header("Location: index.php?error=La clave es requerida");
        exit();
    }else{
        //$clave=md5($clave)
        $Sql="SELECT * FROM usuario WHERE Usuario='$Usuario' AND Clave='$Clave'";
        $result= mysqli_query($conexion,$Sql);

        if (mysqli_num_rows($result)===1){
            $row=mysqli_fetch_assoc($result);
            if ($row['Usuario']===$Usuario && $row['Clave']=== $Clave){

                $_SESSION['Usuario']= $row['Usuario'];
                $_SESSION['Nombre_Completo']= $row['Nombre_Completo'];
                $_SESSION['id']= $row['id'];
                header("Location: Inicio.php");
                exit();

            }else {
               header("Location: index.php?error=El usuario o la clave son incorrectas");
               exit();
            }

        }else{
            header("Location: index.php?error=El usuario o la clave son incorrectas");
               exit();
        }
    }
}else{
   header("Location: index.php");
            exit();
}