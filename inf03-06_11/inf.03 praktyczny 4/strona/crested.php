<?php


function connection(){
    $server = "localhost";
    $user = "root";
    $password = "";
    $base = "swinki";
    
    
    $conn = mysqli_connect($server,$user,$password,$base);
    if ($conn -> connect_errno){
        echo "Nie udało sie połączyć z baza danych";
        exit();
    }
    else{
        return $conn;

    }


}

function executeQuerry($query){
    $con = connection();
    $tab = [];
    if($res = $con->query($query)){
        $i = 0;
        while($row = $res -> fetch_row()){
            $tab[$i++] = $row;
        }
    }
    return $tab;

}





?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="body">
        <div id="Baner">
            <h1>Hodowla świnek morksich - zamów świnkowe maluszki</h1>
        </div>
        <div id='lmenu'>
            <a href="peruwianka.php">Rasa Peruwinaka </a>
            <a href="american.php">Rasa American </a>
            <a href="crested.php">Rasa Crested </a>
        </div>
        <div id ="lbmain">
            <img src="crestedch.jpg" alt="„Świnka morska rasy crested"></img>
            <?php 
               $data =  executeQuerry("SELECT DISTINCT swinki.data_ur,swinki.miot, rasy.rasa from swinki INNER JOIN rasy on swinki.rasy_id = rasy.id where rasy_id = 7");
                echo "<h2>Rasa: {$data[0][2]} </h2>";
                echo "<p>Data Urodzenia {$data[0][0]}</p>";
                echo "<p>Oznaczenie miotu: {$data[0][1]}<p/>";

            ?>
            <hr>
            <h2> Świnki w tym miocie </h2>

            <?php
                $data = executeQuerry("SELECT swinki.imie , swinki.cena , swinki.opis from swinki INNER JOIN rasy on rasy.id = swinki.rasy_id where rasy.id = 7;");
                $r = "";
                foreach($data as $row){
                    $r.="<h3>{$row[0]}-{$row[1]}zl</h3>";
                    $r.="<p>{$row[2]} </p>";

                }
                echo($r);
                
            ?>

        </div>
        <div id="pbmain">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <?php
                $data = executeQuerry("SELECT rasy.rasa FROM rasy");
                $r = "<ol>";
                foreach($data as $row ){
                    $r.="<li>{$row[0]}</li>";
                }
                $r.="</ol>";
                echo($r);

            ?>
        </div>
        <div></div>
        <div></div>
        <div id = "Stopka"> <p>Strone wykonał: 0000000 </p></div>
    </div>
</body>
</html>




