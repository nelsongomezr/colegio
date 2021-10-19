<?php
    require("class/class.php");
    $tra=new Trabajo();
    $gru=new Grupos();
    $jor=new Jornada();
    $grup=$gru->QueryGrupo(); 
    $jorn=$jor->Query_jornada();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Notas</title>
    <link rel="stylesheet" href="CSS/style.css">
</head> 
<body>
    <center>
        <div class="div">
            <form method="POST" class="form">
                <h1>Registro estudiantes</h1>
                <input type="text" name="id" placeholder="Digite el Id" class="inp" required><br>
                <input type="text" name="nom" placeholder="Digite el nombre" class="inp" required><br>
                <input type="text" name="ap" placeholder="Digite el apellido" class="inp" required><br>
                <input type="text" name="dir" placeholder="Digite la direccion" class="inp" required><br>
                <input type="tel" name="tel" placeholder="Digite el telefono" class="inp" required><br>
                <input type="password" name="pas" placeholder="Digite el password" class="inp" required><br>
                <select name="gru" class="sel">
                    <option>Seleccione el grupo</option>
                    <?php for($i=0;$i<sizeof($grup);$i++){?>
                        <option value='<?php echo$grup[$i]['IdGrupo'];?>'><?php echo $grup[$i]['NombreGrupo'];?></option>
                    <?php }?>
                </select><br>
                <select name="jor" class="sel">
                    <option>Selecciones la jornada</option>
                    <<?php for($i=0;$i<sizeof($jorn);$i++){?>
                    <option value='<?php echo$jorn[$i]['Idjornada'];?>'><?php echo $jorn[$i]['NombreJornada'];?></option>
                    <?php }?>
                </select><br>
                <input type="submit" name="enviar" value="Registrar" class="bottom">
            </form>
        </div>
    </center>
</body>
</html>
<?php
    if(isset($_POST['enviar']))
    {
        $up=array();
        $up=$_POST;
        $tra1=$tra->Insertest($up);
    }
    
?>