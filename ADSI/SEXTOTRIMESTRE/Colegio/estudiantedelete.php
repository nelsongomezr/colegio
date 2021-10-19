<?php
    require("class/class.php");
    print_r($_GET);
    $id=$_GET['id'];
    $id;
    $tra=new Trabajo();
    $tra1=$tra->DeleteEst($id);
?>