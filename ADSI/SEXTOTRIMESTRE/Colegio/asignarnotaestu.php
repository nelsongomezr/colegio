<?php
    require("class/class.php");
    $peri= new Periodo;
    $per=$peri->query_periodo();
    $mater= new Materia;
    $mate=$mater->query_materia();
    $jor=new Jornada();
    $jorn=$jor->Query_jornada();
    if(isset($_POST['enviar']))
    {
        $tra=new Grupos();
        $tra1=$tra->Query_Curso_jor($_POST['gru'],$_POST['jor']);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignacion de notas</title>
    <link rel="stylesheet" href="CSS/stylesnota.css">
</head>
<body>
    <center>
    <div class="div">
        <form method="POST" class="form">
            <h1>Asignar Notas</h1>
            <input type="text" name="gru" placeholder="Digite el grupo" class="inp"><br>
            <select name="jor" class="sel">
                    <option>Selecciones la jornada</option>
                    <<?php for($i=0;$i<sizeof($jorn);$i++){?>
                    <option value='<?php echo$jorn[$i]['Idjornada'];?>'><?php echo $jorn[$i]['NombreJornada'];?></option>
                    <?php }?>
                </select><br>
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
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Nota Final</th>
                    <th>Periodo</th>
                    <th>Materia</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    <th>Guardar</th>
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
                    <form method="GET">
                        <td><input type="text" name="n1" placeholder="nota 1" class="sel1"></td>
                        <td><input type="text" name="n2" placeholder="nota 2" class="sel1"></td>
                        <td><input type="text" name="n3" placeholder="nota 3" class="sel1"></td>
                        <td><input type="text" name="n4" placeholder="nota 4" class="sel1"></td>
                        <td><input type="text" name="nf" placeholder="nota Final" class="sel1"></td>
                        <td>
                            <select name="pr" class="sel2">
                                <option value="1">Periodo 1</option>
                                <option value="2">Periodo 2</option>
                                <option value="3">Periodo 3</option>
                                <option value="4">Periodo 4</option>
                            </select>
                        <td>
                        
                            <select name="ma" class="sel2">
                                <option>Materia</option>
                                <option value="1">Español</option>
                                <option value="2">Matematicas</option>
                                <option value="3">Ingles</option>
                                <option value="4">Historia</option>
                                <option value="5">Artes</option>

                            </select>
                        </td>
                        <td><?php echo'<a href=estudianteupdate.php?id='.$id.'>'; ?><img src="img/editar.png?$id=".$id></a></td>
                        <td><?php echo'<a href=estudiantedelete.php?id='.$id.'>'; ?><img src="img/eliminar.png?$id"></a></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" value="Guardar" name="envia" class="bottom1">
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
        $nota[]=[$_GET];       
        $not= new Nota;
        $not1=$not->Insert_nota($nota);
    }
?>

