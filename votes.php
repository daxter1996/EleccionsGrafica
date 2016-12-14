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

    $arrayGeneral = [];
    $tableInfo = ["Blanks","Nulls"];


    for($i = 0;$i<$_POST["parties"];$i++){
        array_push($tableInfo,$_POST["party-".$i]);
    }

    for($i = 0;$i<$_POST["parties"]+2;$i++){
        $arrayGeneral[$tableInfo[$i]]= 0;
    }

    for($i = 1;$i<=$_POST["towns"];$i++){
        for($j = 1;$j<=$_POST["parties"]+2;$j++){
            $arrayGeneral[$tableInfo[$j-1]] += $_POST[($i)."-".($j)."/"];
        }
    }

    echo print_r($arrayGeneral);

    $representatives = [];

    for($i = 0;$i<$_POST["parties"];$i++){
        $representatives[$_POST["party-".$i]] = explode(",",$_POST["representatives-".$i]);;
    }
    echo print_r($representatives);

?>

</body>
</html>