<?php

function getDataBase(){
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "motory";

    $connect = mysqli_connect($server,$user,$password,$database);
    return $connect;
}
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="pliki/motor.png"> 
    </img>
    <div id="all">
        <div id="header">
            <h2>Motocykle - moja pasja </h2>
        </div>
        <div id="left">
            <h2>Gdzie pojechać? </h2>
            <?php
                $query = "SELECT wycieczki.nazwa ,wycieczki.opis,wycieczki.poczatek, zdjecia.zrodlo from wycieczki INNER JOIN zdjecia on zdjecia.id = wycieczki.zdjecia_id";
                $resault = mysqli_query(getDataBase(),$query);
                $text = "<dl>";
                while($row = mysqli_fetch_array($resault,MYSQLI_ASSOC)){
                    $text.="<dt>{$row['nazwa']} rozpoczyna sie w {$row['poczatek']} <a href = 'pliki/".$row['zrodlo'].".jpg'>zobacz zdjęcie</a></dt>";
                    $text.="<dd>{$row['opis']} </dd>";
                }
                $text.="</dl>";
                echo($text);
                mysqli_close(getDataBase());
            

             ?>
        </div>
        <div id="upperRight" class="right">
            <h2>Co kupić? </h2>
            <ol>
                <li>Honda CBR125R </li>
                <li>Yamaha YBR125” </li>
                <li>Honda VFR800i </li>
                <li>Honda CBR1100XX </li>
                <li>BMW R1200GS LC” </li>
            </ol>
        </div>
        <div id="bottomRight" class="right">
            <h2>Statystyki</h2>
            <?php
                $query = "SELECT COUNT(wycieczki.nazwa) as ilosc from wycieczki";
                $resault = mysqli_query(getDataBase(),$query);
                $text = "<p>";
                while($row = mysqli_fetch_array($resault,MYSQLI_ASSOC)){
                    $text.="Wpisanych wycieczek {$row['ilosc']}";
                }
                $text.="</p>";
                echo($text);
                mysqli_close(getDataBase());
            

             ?>
            <p>Użytkowników forum: 200 </p>
            <p>Przesłanych zdjęć: 1300 </p>
        </div>
        <div id="footer">
            <a>Stronę wykonał: 00000000 </a>
        </div>

    </div>
</body>
</html>


<?php 



?>