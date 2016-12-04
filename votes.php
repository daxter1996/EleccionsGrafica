<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings 2</title>
</head>
<body>

<?php

   // echo print_r($_POST);
    $arrayGeneral = [];
    $tableInfo = ["Blanks","Nulls"];

    for($i = 0;$i<$_POST["parties"];$i++){
        array_push($tableInfo,$_POST["party-".$i]);
    }

    /*for($i = 1;$i<=$_POST["towns"];$i++){
        echo "<hr/>". $_POST[$i."-0/"] . "</br>";
        for($j = 1;$j<=$_POST["parties"]+2;$j++){
            echo $tableInfo[$j-1]." ";
            echo " ".$_POST[$i."-".$j."/"] . "<br/>";
        }
    }*/

    for($i = 1;$i<=$_POST["towns"];$i++){
        //echo "<hr/>". $_POST[$i."-0/"] . "</br>";
        $tmp = [];
        for($j = 1;$j<=$_POST["parties"]+2;$j++){
            $tmp[$tableInfo[$j-1]] = $_POST[$i."-".$j."/"];
        }
        $arrayGeneral[$_POST[$i."-0/"]] = $tmp;
    }

    echo print_r($arrayGeneral);

?>

</body>
</html>