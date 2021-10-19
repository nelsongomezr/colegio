<?php
    require("conexion.php");

    class Trabajo extends conexion
    {
        Private $query=array();

        public function Consulta($id)
        {
            $sql="CALL consulta_est_id(:id)";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":id"=>$id));
            while($reg=$res->fetch(PDO::FETCH_ASSOC))
            {
                $this->query[]=$reg;
            }
            return $this->query;
        }
        public function Insertest($up)
        {
            try
            {
                if($up['id']=="" or($up['nom']=="") or($up['ap']=="") or($up['dir']=="") or($up['tel']=="") or($up['pas']=="") or($up['gru']=="") or($up['jor']==""))
                {
                    echo"<script type'text/javascript'>
                    alert('Debe diligenciar todos los campos');
                    window.location='estudiantereg.php';
                    </script>";
                }
                else
                {
                    $id=$up['id'];
                    $nom=$up['nom'];
                    $ap=$up['ap'];
                    $dir=$up['dir'];
                    $tel=$up['tel'];
                    $pas=$up['pas'];
                    $gru=$up['gru'];
                    $jor=$up['jor'];
                    $sql="CALL consulta_est_id(:id)";
                    $res=$this->conex->prepare($sql);
                    $res->execute(array("id"=>$id));
                    while($reg=$res->fetch(pdo::FETCH_ASSOC))
                    {
                        $this->query[]=$reg;
                    }
                    $s=sizeof($this->query);
                    if($s>0)
                    {
                        echo"<script type'text/javascript'>
                        alert('Alumno ya existe');
                        window.location='estudiantereg.php';
                        </script>";
                    }
                    else
                    {
                        $sql="CALL Insert_est(:id,:nom,:ap,:dir,:tel,:pas,:gru,:jor)";
                        $res=$this->conex->prepare($sql);
                        $res->execute(array("id"=>$id,"nom"=>$nom,"ap"=>$ap,"dir"=>$dir,"tel"=>$tel,"pas"=>$pas,"gru"=>$gru,":jor"=>$jor));
                    }
                    echo"<script type'text/javascript'>
                    alert('El alumno se registro exitisamente');
                    window.location='estudiantereg.php';
                    </script>";
                }
            }
            catch(exception $e)
            {
            echo"No se realizo la actualizacion del registro".$e->getMessage();
            }
        }
        public function Updatest($in)
        {
            try
            {
                $id=$in[0]['id'];
                $nom=$in[0]['nom'];
                $ap=$in[0]['ap'];
                $dir=$in[0]['dir'];
                $tel=$in[0]['tel'];
                $pas=$in[0]['pas'];
                $gru=$in[0]['gru'];
                $jor=$in[0]['jor'];
                $sql="CALL consulta_est_id(:id)";
                $res=$this->conex->prepare($sql);
                $res->execute(array("id"=>$id));
                while($reg=$res->fetch(pdo::FETCH_ASSOC))
                {
                    $this->query[]=$reg;
                }
                $s=sizeof($this->query);
                if($s>0)
                {
                    $sql1="CALL update_estudiante(:id,:nom,:ap,:dir,:tel,:pas,:gru,:jor)";
                    $res=$this->conex->prepare($sql1);
                    $res->execute(array("id"=>$id,"nom"=>$nom,"ap"=>$ap,"dir"=>$dir,"tel"=>$tel,"pas"=>$pas,"gru"=>$gru,":jor"=>$jor));
                    echo"<script type'text/javascript'>
                    alert('Registro actualizado exitosamente');
                    window.location='estudiantecon.php';
                    </script>";
                }
                else
                {
                    echo"<script type'text/javascript'>
                    alert('El estudiante no existe');
                    window.location='estudiantecon.php';
                    </script>";
                }
            }
            catch(exception $e)
            {
            echo"No se realizo la actualizacion del registro".$e->getMessage();
            }
        }
        public function DeleteEst($id)
        {
            $sql="CALL delete_estudiante(:id)";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":id"=>$id));
            echo"<script type'text/javascript'>
            alert('El estudiante se elimino Exitosamente');
            window.location='estudiantecon.php';
            </script>";
        }
    }
    class Grupos extends conexion
    {
        private $quer=array();
        private $que=array();
        private $qu=array();
        private $queryy=array();
        public function QueryGrupo()
        {
            $sql="CALL consulta_grupo";
            $con=$this->conex->query($sql);
            while ($reg=$con->fetch(pdo::FETCH_ASSOC)) {
                $this->quer[]=$reg;
            }
            return $this->quer;
        }
        public function Query_grupo($nom)
        {
            if (empty($nom) and $nom=="") {
                echo"<script type'text/javascript'>
                    alert('Debe diligenciar todos los campos');
                    window.location='estudiantecon.php';
                    </script>";
            } else {
                $sql="CALL consulta_estu_grupo(:nom)";
                $res=$this->conex->prepare($sql);
                $res->execute(array(":nom"=>$nom));
                while ($reg=$res->fetch(PDO::FETCH_ASSOC)) {
                    $this->que[]=$reg;
                }
                return $this->que;
            }
        }
        public function Asig_grupo($i)
        {
            $id=$i[0]['id'];
            $cur=$i[0]['gr'];
            $sql="CALL Asignar_curso(:id,:cur)";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":id"=>$id, ":cur"=>$cur));
            echo"<script type'text/javascript'>
            alert('Se asigno Correctamente el curso');
            window.location='estudiantecon.php';
            </script>";
        }
        public function Query_Curso($cur)
        {
            $grado=substr($cur, 0, 1);
            $cur1=substr($cur, -1);
            $sql="CALL estudiante_curso(:nom,:cur)";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":nom"=>$grado,":cur"=>$cur1));
            while ($reg=$res->fetch(PDO::FETCH_ASSOC)) {
                $this->qu[]=$reg;
            }
            return $this->qu;
        }
        public function Query_Curso_jor($cur,$jor)
        {
            if($cur=="" or($jor==""))
            {
                echo"<script type'text/javascript'>
                alert('Debe diligenciar todos los campos');
                window.location='asignarnotaestu.php';
                </script>";
            }else
            {
                $grado=substr($cur,0,1);
                $cur1=substr($cur,-1);
                $sql="CALL curso_jornada(:nom,:cur,:jor)";
                $res=$this->conex->prepare($sql);
                $res->execute(array(":nom"=>$grado,":cur"=>$cur1,":jor"=>$jor));
                while($reg=$res->fetch(PDO::FETCH_ASSOC))
                {
                    $this->queryy[]=$reg;
                }
                return $this->queryy;
            }
            
        }
    }  
    class Jornada extends conexion
    {
        private $qu=array();
        private $q=array();
        public function Query_jornada()
        {
            $sql="CALL consulta_jornada()";
            $con=$this->conex->query($sql);
            while($reg=$con->fetch(PDo::FETCH_ASSOC))
            {
                $this->qu[]=$reg;
            }
            return $this->qu;
        }

    }
    class Materia extends conexion
    {
        public $mater1=array();
        public $mater2=array();
        public $mater3=array();
        public $mater4=array();
    
        public function query_materia()
        {
            $sql="CALL materia_query()";
            $mat=$this->conex->query($sql);
            while($reg=$mat->fetch(PDO::FETCH_ASSOC))
            {
                $this->mater1[]=$reg;
            }
            return $this->mater1;
        }

    }
    class Periodo extends conexion
    {
        public $periodo1=array();
        public $periodo2=array();
        public $periodo3=array();
        public $periodo4=array();
    
        public function query_periodo()
        {
            $sql="CALL Periodo_query()";
            $mat=$this->conex->query($sql);
            while($reg=$mat->fetch(PDO::FETCH_ASSOC))
            {
                $this->mater1[]=$reg;
            }
            return $this->mater1;
        }
    }
    class Nota extends conexion
    {
        public $n1=array();
        public $n2=array();
        public $n3=array();
        public $n4=array();
    
        public function Insert_nota($no)
        {
            if (isset($no)) {
            }else
            {
                $id=$no['id'];
                $n1=$no['n1'];
                $n2=$no['n2'];
                $n3=$no['n3'];
                $n4=$no['n4'];
                $nf=($n1+$n2+$n3+$n4)/4;
                $per=$no['pr'];
                $mat=$no['ma'];
                $sql="CALL nota_insert(:id,:n1,:n2,:n3,:n4,:nf,:per,:mat)";
                $res=$this->conex->prepare($sql);
                $res->execute(array(":id"=>$id,":n1"=>$n1,":n2"=>$n2,":n3"=>$n3,":n4"=>$n4,":nf"=>$nf,":per"=>$per,":mat"=>$mat));
                $not=$this->conex->query($sql);
            }
            
        }
    }
?>