<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .transform{
            display: flex;
            flex-direction:row;
            border:0;
        }
    </style>
</head>
<body onload ='GenererCaptcha()'>
    <h1>Evaluation d'un hotel</h1>
    <form action="./Evaluation2.php" method="POST" onsubmit="return verif()">
        <label for="hotel">hotel</label>
        <select name="hotel" id="hotel">
            <option value="0" selected disabled hidden >choisir un hotel</option>
        <?php
            $c = mysql_connect("localhost","root","");
            $bd = mysql_select_db("bd2018");
            $req = "SELECT IdHotel,NomHotel FROM hotel";
            $res = mysql_query($req);
            while($e = mysql_fetch_array($res))
                echo("<option value='$e[0]'>$e[1]</option>");
        ?>
        </select>
        <table>
            <tr>
                <td>Accueil :</td>
                <td>
                    <input type="radio" name="a" id="aTS" value="3" >Très satisfaisant
                    <input type="radio" name="a" id="aS" value="2" >Satisfaisant
                    <input type="radio" name="a" id="aPS" value="1" >Peu satisfaisant
                </td>
            </tr>
            <tr>
                <td>Restauration :</td>
                <td>
                    <input type="radio" name="r" id="rTS" value="3" >Très satisfaisant
                    <input type="radio" name="r" id="rS" value="2" >Satisfaisant
                    <input type="radio" name="r" id="rPS" value="1" >Peu satisfaisant
                </td>
            </tr>
            <tr>
                <td>Extra :</td>
                <td>
                    <input type="checkbox" name="PC" id="PC" value="4" >Piscine couverte<br>
                    <input type="checkbox" name="PP" id="PP" value="2" >Plage privée<br>
                    <input type="checkbox" name="CW" id="CW" value="1" >Couverture Wifi<br>
                </td>
            </tr>
            <tr>
                <td>
                    <p>combien de lettres majuscule dans la zone captcha</p>
                </td>
                <td class="transform">
                    <div>
                        <label for="cap">captcha :</label>
                        <input type="text" id="cap"><br>
                        <label for="rep">reponce :</label>
                        <input type="text" id="rep">
                    </div>
                    <button onclick="return GenererCaptcha()">actualiser</button>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="reset" value="Annuler">
                    <input type="submit" value="Valider">
                </td>
            </tr>
            
        </table>
    </form>
    <script src="./Controle.js"></script>
</body>
</html>