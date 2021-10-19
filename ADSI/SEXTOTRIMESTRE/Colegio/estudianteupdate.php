<?php
require("class/class.php");
$tra=new Trabajo();
$id=$_GET['id'];
$trab1=$tra->Consulta($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos estudiante</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
        <div class="div">
            <form method="POST" class="form">
                <h1>Actulizacion de datos</h1>
                <input type="text" name="id" value="<?php echo $trab1[0]['IdEstudiante'];?>" class="inp"><br>
                <input type="text" name="nom" value="<?php echo $trab1[0]['Nombre_est'];?>" class="inp"><br>
                <input type="text" name="ap" value="<?php echo $trab1[0]['Apellidos'];?>" class="inp"><br>
                <input type="text" name="dir" value="<?php echo $trab1[0]['Direccion_est'];?>" class="inp"><br>
                <input type="text" name="gru" value="<?php echo $trab1[0]['Grupo_IdGrupo'];?>" class="inp"><br>
                <input type="text" name="jor" value="<?php echo $trab1[0]['Grupo_Jornada_IdJornada'];?>" class="inp"><br>
                <input type="text" name="tel" value="<?php echo $trab1[0]['Telefono_est'];?>" class="inp"><br>
                <input type="text" name="pas" value="<?php echo $trab1[0]['Password'];?>" class="inp"><br>
                <input type="submit" name="enviar" value="Actualizar" class="bottom">
            </form>
        </div>
    </center>
</body>
</html>
<?php
    if(isset($_POST['enviar']))
    {
        $in=array();
        $in[]=$_POST;
        $trab2=$tra->Updatest($in);
    }
    
?>