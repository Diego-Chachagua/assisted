<?php  ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
}

h1{
    text-align: center;
}

.anio{
    text-align: left;
    margin-left: 90px;
}

.seccion{
    text-align: center;
    margin-top: -30px;
}

.mes{
    text-align: right;
    margin-top: -30px;
    margin-right: 90px;
}

table, th{
    border-collapse:collapse;
    border: 2px solid rgb(6, 6, 6);
    text-align: center;
}

table{
    margin-left: 50px;
}

.nombre{
    width: 250px;
}

.semana{
    width: 150px;
}

.minitabla{
    border-collapse:collapse;
    border: 2px solid rgb(6, 6, 6);
    text-align: center;
    margin-left: 0px;

}

td{
    border: 2px solid rgb(6, 6, 6);
}
.dia{
    width: 35px;
}

.cheq{
    height: 15px;
}

.cancel{
    height: 10px;
}
    </style>
</head>
<body>
    <br>
    <h1>Listado de asistencia Instituto Nacional Cornelio Azenón Sierra 2023</h1>
    <br>
    <h2 class="anio">A&ntilde;o:</h2><h2 class="seccion">Seccion:</h2><h2 class="mes">Mes:Septiembre</h2><br><br><br>
    <table>
        <thead>
            <tr>
            <th class="num">N°</th>
            <th class="nombre">Nombre Completo</th>
            <th class="semana">Semana 1
                <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            <th class="semana">Semana 2
            <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            <th class="semana">Semana 3
            <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            <th class="semana">Semana 4
            <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <tr>
        <th class="num2">1</th>
        <th class="nom2">Josue Neftaly Albanez Teran</th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        </tbody>
    </table>
</body>
</html>
<?php

$html= ob_get_clean();

require_once '../libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','landscape'); 

$dompdf->render();

$dompdf->stream("boleta.pdf", array("Attachment" =>false));
?>