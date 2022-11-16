<?php 
include 'functions.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div style="width: 50%; float: left" ;>
        <form action="" method="POST">
            <label for="word"> Upišite riječ: </label>
            </br>
            <input type="text" name="word">
            </br>
            </br>
            <input type="submit" value="Pošalji">
    </div>
</form>

    <div style:"width: 50%; float: right";>

        <table border="1" cellpadding="10">
            <tr>
                <th>Riječ</th>
                <th>Podjela riječi na slova</th>
                <th>Broj suglasnika u riječi</th>
                <th>Broj samoglasnika u riječi</th>
            </tr>
            <?php

            $wordJson = file_get_contents(__DIR__."/words.json");
            $letters = json_decode($wordJson, true);
            
            if(empty($_POST))
            {

                echo "Molimo upišite željenu riječ!";
            }
            elseif(empty($_POST["word"]))
            {

                echo "Polje mora biti popunjeno!";
            }
             
            elseif(!empty($_POST["word"])  && ctype_alpha($_POST["word"]))
            {

                echo "Molimo upišite željenu riječ!"; 
                $word =$_POST["word"];
                $letters[] = $_POST["word"];

            }
            
            else {

                echo "Upišite riječ!";
            }

            $wordJson = json_encode($letters);
            file_put_contents(__DIR__."/words.json", $wordJson);


            foreach($letters as $character)
        {

            $characterCount = strlen($character); 
            $samoglasnikCount = brojacZnakova($character)[0];
            $suglasnikCount = brojacZnakova($character)[1];

            echo '<tr>';
            echo '<td>'.$character.'</td>'; 
            echo '<td>'.$characterCount.'</td>'; 
            echo '<td>'.$samoglasnikCount.'</td>'; 
            echo '<td>'.$suglasnikCount.'</td>'; 
            echo '</tr>';

        }

     ?>

        </table>

    </div>

</body>

</html>