<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $time = date("Y") . "-" . date("m") . "-" . date("d");
        $PC="0";
        $PP="0";
        $CW="0";
        if (isset($_POST['hotel']) and isset($_POST['a']) and isset($_POST['r']) ) {
            $hotel = $_POST['hotel'];
            $a = $_POST['a'];
            $r = $_POST['r'];
            if(isset($_POST['PC']))
                $PC=isset($_POST['PC']);
            if(isset($_POST['PP']))
                $PP=isset($_POST['PP']);
            if(isset($_POST['CW']))
                $CW=isset($_POST['CW']);
        } else {
            $hotel = "";
            $a = "";
            $r = "";
        }
        $extra = intval($PC)+intval($PP)+intval($CW);
        $c = mysql_connect("localhost", "root", "");
        $b = mysql_select_db('bd2018');
        $req = "SELECT * FROM evaluation WHERE `DateEval` = '$time'";
        $res = mysql_query($req);
        if(mysql_num_rows($res) > 0)
            echo("Cet hôtel est déjà évalué !");
        else{
            $req2 = "INSERT INTO evaluation (DateEval, IdHotel, NoteAccueil, NoteRest, NoteExtra) VALUES ('$time', '$hotel', '$a', '$r', '$extra');";
            $res2 = mysql_query($req2);
            echo('Evaluation enregistrée avec succès ');
        }
        
    ?>
</body>
</html>