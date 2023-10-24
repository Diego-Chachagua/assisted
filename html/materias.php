<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
    <link rel="stylesheet" href="/assisted/css/cssc.css">
</head>
<body>
    <header>
        <div class="cabecera">
            <img class="as" src="/assisted/img/asis.png">
            <a  id="i" href="#">Inicio</a>
            <img id="c" src="/assisted/img/us.png">
            <p id="tit">Control de asistencia</p>
            <a href="#">
                <img id="e" src="/assisted/img/salida.png">
            </a>
            <p class="sesion">Cerrar sesi&oacute;n</p>
        </div>
    </header><br><br>
        <h1>Registro de asistencia</h1><br><br><br><br>
         <button class="materias" id="1" onclick="ciencia()">   
            <div class="foto">
                <img class="ciencias" src="/assisted/img/ciencia.png" alt="">
            
            <div class="pie">
                <P class="letras">CIENCIAS</P>
            </div>
    </button>  

    <button class="materias" id="1" onclick="lenguaje()">   
        <div class="foto">
            <img class="ciencias" src="/assisted/img/lenguaje.png" alt="">
        
        <div class="pie">
            <P class="letras">LENGUAJE</P>
        </div>
</button>    

<button class="materias" id="1" onclick="sociales()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/sociales.png" alt="">
    
    <div class="pie">
        <P class="letras">SOCIALES</P>
    </div>
</button>  

<button class="materias" id="1" onclick="matematica()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/matematica.png" alt="">
    
    <div class="pie">
        <P class="letras">MATEMATICA</P>
    </div>
</button>  

<button class="materias" id="1" onclick="ingles()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/inglis.png" alt="">
    
    <div class="pie">
        <P class="letras">INGLES</P>
    </div>
</button>  

<button class="materias" id="1" onclick="informatica()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/informatica.png" alt="">
    
    <div class="pie">
        <P class="letras">INFORMATÍCA</P>
    </div>
</button>

<button class="materias" id="1" onclick="oplv()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/oplv.png" alt="">
    
    <div class="pie">
        <P class="letras">OPLV</P>
    </div>
</button>

<button class="materias" id="1" onclick="turismo()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/turismo.png" alt="">
    
    <div class="pie">
        <P class="letras">TURISMO</P>
    </div>
</button>

<button class="materias" id="1" onclick="ceminario()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/ceminario.png" alt="">
    
    <div class="pie">
        <P class="letras">SEMINARIO</P>
    </div>
</button>

<button class="materias" id="1" onclick="hpp()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/hpp.png" alt="">
    
    <div class="pie">
        <P class="letras">HPP</P>
    </div>
</button>

<button class="materias" id="1" onclick="sotfware()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/sotfware.png" alt="">
    
    <div class="pie">
        <P class="letras">SOTFWARE</P>
    </div>
</button>

<button class="materias" id="1" onclick="agropecuario()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/agropecuario.png" alt="">
    
    <div class="pie">
        <P class="letras">AGROPECUARIO</P>
    </div>
</button>

<button class="materias" id="1" onclick="electricidad()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/electricidad.png" alt="">

    <div class="pie">
        <P class="letras">ELECTRICIDAD</P>
    </div>
</button>

<button class="materias" id="1" onclick="contaduria()">   
    <div class="foto">
        <img class="ciencias" src="/assisted/img/contaduria.png" alt="">
    
    <div class="pie">
        <P class="letras">CONTADURIA</P>
    </div>
</button>

</body>
</html>
<?php
require ('conexion.php');

if(isset($_SESSION['usu'])){
    $usu=$_SESSION['usu'];
    $contra=$_SESSION['contra'];


    $usos=mysqli_query($conexion,"SELECT c_profe FROM usuario  where usu_p='$usu' and contra_p=$contra");

    if($usos){
        if (mysqli_num_rows($usos) > 0) {
            $mani = mysqli_fetch_assoc($usos);
            $pluto = $mani ['c_profe'];

            $chivi = mysqli_query($conexion,"SELECT c_materia FROM profe_materia where c_profe ='$pluto'");

            if($chivi){
                if(mysqli_num_rows($chivi) > 0){
                    $codm=array();

                    while($fila= mysqli_fetch_assoc($chivi)){
                        $codm[]=$fila['c_materia'];
                    }

                    $cual = count($codm);

                    for($i=0;$i<$cual;$i++){
                        if ($i==0){
                            $cmateria1=$codm[$i];
                        }elseif($i==1){
                            $cmateria2=$codm[$i];
                        }elseif($i==2){
                            $cmateria3=$codm[$i];
                        }elseif($i==3){
                            $cmateria4=$codm[$i];
                        }elseif($i==4){
                            $cmateria5=$codm[$i];
                        }
                    }

                    if(empty($cmateria1)){
                        $cmateria1 = 0;
                    }
                    if(empty($cmateria2)){
                        $cmateria2 = 0;
                    }
                    if(empty($cmateria3)){
                        $cmateria3 = 0;
                    }
                    if(empty($cmateria4)){
                        $cmateria4 = 0;
                    }
                    if(empty($cmateria5)){
                        $cmateria5 = 0;
                    }
                  
                }else{
                    $cmateria=null;
                }
            }else{
                $cmateria=null;
            }
        }else{
            $cmateria=null;
        }
    }else{
        $cmateria=null;
    }

}else{
    $usuario=null;
}

?>
<script type="text/javascript">
var materia1 = <?php echo $cmateria1; ?>;
var materia2 = <?php echo $cmateria2; ?>;
var materia3 = <?php echo $cmateria3; ?>;
var materia4 = <?php echo $cmateria4; ?>;
var materia5 = <?php echo $cmateria5; ?>;

function ciencia() {
    
    if (materia1==1){
        condicion=1;
    }
    if (materia2==1){
        condicion=1;
    }
    if (materia3==1){
        condicion=1;
    }
    if (materia4==1){
        condicion=1;
    }
    if (materia5==1){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "ciencia";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}

function lenguaje() {
    
    if (materia1==2){
        condicion=1;
    }
    if (materia2==2){
        condicion=1;
    }
    if (materia3==2){
        condicion=1;
    }
    if (materia4==2){
        condicion=1;
    }
    if (materia5==2){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "lenguaje";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function sociales() {
    
    if (materia1==3){
        condicion=1;
    }
    if (materia2==3){
        condicion=1;
    }
    if (materia3==3){
        condicion=1;
    }
    if (materia4==3){
        condicion=1;
    }
    if (materia5==3){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "sociales";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function ingles() {
    
    if (materia1==4){
        condicion=1;
    }
    if (materia2==4){
        condicion=1;
    }
    if (materia3==4){
        condicion=1;
    }
    if (materia4==4){
        condicion=1;
    }
    if (materia5==4){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "ingles";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function informatica() {
    
    if (materia1==5){
        condicion=1;
    }
    if (materia2==5){
        condicion=1;
    }
    if (materia3==5){
        condicion=1;
    }
    if (materia4==5){
        condicion=1;
    }
    if (materia5==5){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "informatica";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function oplv() {
    
    if (materia1==6){
        condicion=1;
    }
    if (materia2==6){
        condicion=1;
    }
    if (materia3==6){
        condicion=1;
    }
    if (materia4==6){
        condicion=1;
    }
    if (materia5==6){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "oplv";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function ceminario() {
    
    if (materia1==7){
        condicion=1;
    }
    if (materia2=7){
        condicion=1;
    }
    if (materia3==7){
        condicion=1;
    }
    if (materia4==7){
        condicion=1;
    }
    if (materia5==7){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "ceminario";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function hpp() {
    
    if (materia1==8){
        condicion=1;
    }
    if (materia2==8){
        condicion=1;
    }
    if (materia3==8){
        condicion=1;
    }
    if (materia4==8){
        condicion=1;
    }
    if (materia5==8){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "hpp";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function muci() {
    
    if (materia1==9){
        condicion=1;
    }
    if (materia2==9){
        condicion=1;
    }
    if (materia3==9){
        condicion=1;
    }
    if (materia4==9){
        condicion=1;
    }
    if (materia5==9){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "muci";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function matematica() {
    
    if (materia1==10){
        condicion=1;
    }
    if (materia2==10){
        condicion=1;
    }
    if (materia3==10){
        condicion=1;
    }
    if (materia4==10){
        condicion=1;
    }
    if (materia5==10){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "matematica";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function elctricidad() {
    
    if (materia1==11){
        condicion=1;
    }
    if (materia2==11){
        condicion=1;
    }
    if (materia3==11){
        condicion=1;
    }
    if (materia4==11){
        condicion=1;
    }
    if (materia5==11){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "electricidad";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function agropecuario() {
    
    if (materia1==12){
        condicion=1;
    }
    if (materia2==12){
        condicion=1;
    }
    if (materia3==12){
        condicion=1;
    }
    if (materia4==12){
        condicion=1;
    }
    if (materia5==12){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "agropecuario";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function turismo() {
    
    if (materia1==13){
        condicion=1;
    }
    if (materia2==13){
        condicion=1;
    }
    if (materia3==13){
        condicion=1;
    }
    if (materia4==13){
        condicion=1;
    }
    if (materia5==13){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "turismo";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function software() {
    
    if (materia1==14){
        condicion=1;
    }
    if (materia2==14){
        condicion=1;
    }
    if (materia3==14){
        condicion=1;
    }
    if (materia4==14){
        condicion=1;
    }
    if (materia5==14){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "software";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}
function contaduria() {
    
    if (materia1==15){
        condicion=1;
    }
    if (materia2==15){
        condicion=1;
    }
    if (materia3==15){
        condicion=1;
    }
    if (materia4==15){
        condicion=1;
    }
    if (materia5==15){
        condicion=1;
    }

    if(condicion != 1){
        btnEnviar.disiabled=true;
        return false;
        
    }
    var dato = "contaduria";
    window.location.href = "./modificar_opciones.php?dato="+dato;
}







</script>
