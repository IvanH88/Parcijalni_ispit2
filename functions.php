<?php 
function brojacZnakova($word) {

    $word = strtolower($word); 
    $word =str_split(($word)); 

    $suglasnik = 0; 
    $samoglasnik =0; 


    foreach($word as $charater)
    {

        switch($charater)
        {

            case "a": 
            case "e": 
            case "i":
            case "o": 
            case "u": 
            
                $samoglasnik++; 
            
                break;

            default: 
            $suglasnik++; 
            break;
        }

    }

    return array($samoglasnik, $suglasnik);


}



?>