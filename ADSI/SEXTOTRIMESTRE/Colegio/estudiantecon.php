<?php
    require("class/class.php");
    if(isset($_POST['enviar']))
    {
        $tra=new Grupos();
        $con=$_POST['consulta'];
        if($con==1)
        {
            $nom=$_POST['gru'];
            $tra1=$tra->Query_grupo($nom);
        }else if($con==2)
        {
            $tra=new Grupos();
            $tra1=$tra->Query_Curso($_POST['gru']);
        }else if($con==3)
        {
            $tra=new Trabajo();
            $tra1=$tra->Consulta($_POST['gru']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta estudiantes por grupo</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <center>
    <div class="div">
        <form method="POST" class="form">
            <h1>Consulta estudiante</h1>
            <input type="text" name="gru" placeholder="Digite el grupo" class="inp"><br>
            Grado <input type="radio" name="consulta" value="1"> 
            Curso <input type="radio" name="consulta" value="2">
            Documento <input type="radio" name="consulta" value="3"><br>
            <input type="submit" name="enviar" value="Consultar" class="bottom"><br>
        </form>
        </center>
    </div>
    <div class="div1">
        <table border="1" class="table">
            <thead class="thead">
                <tr>
                    <th>Id Estudiante</th>
                    <th>Apellidos</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Curso</th>
                    <th>Jornada</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Password</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    <th>Asignar grupo</th>
                </tr>
            </thead>
    <?php
        if(empty($tra1)){
        }
        else
        {
            for ($i=0;$i<sizeof($tra1);$i++) 
            {?>
                <tr>
                    <td><?php echo $id=$tra1[$i]['IdEstudiante']?></td>
                    <td><?php echo $tra1[$i]['Apellidos']?></td>
                    <td><?php echo $tra1[$i]['Nombre_est']?></td>
                    <td><?php echo $tra1[$i]['NombreGrupo']?></td>
                    <td><?php echo $tra1[$i]['Curso']?></td>
                    <td><?php echo $tra1[$i]['NombreJornada']?></td>
                    <td><?php echo $tra1[$i]['Direccion_est']?></td>
                    <td><?php echo $tra1[$i]['Telefono_est']?></td>
                    <td><?php echo $tra1[$i]['Password']?></td>
                    <td><?php echo'<a href=estudianteupdate.php?id='.$id.'>'; ?><img src="img/editar.png?$id=".$id></a></td>
                    <td><?php echo'<a href=estudiantedelete.php?id='.$id.'>'; ?><img src="img/eliminar.png?$id"></a></td>
                    <td>
                        <form method="GET">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <select name="gr" class="sel1">
                                <option>Seleccione el grupo</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                            </select>
                            <input type="submit" value="Asignar" name="envia" class="bottom1">
                            </form>
        <?php
            }?>
                    </td>
                </tr>
                <tr><th colspan="6">Total estudiantes: </th><th colspan="5"><?php echo sizeof($tra1);?></th></tr>
        </table>
    </div>
</body>
</html>
<?php
    }
    if (isset($_GET['envia'])) 
    {
        $ac=[$_GET];
        $tra=new Grupos();
        $tra1=$tra->Asig_grupo($ac);


    }
?>

