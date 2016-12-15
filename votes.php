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
require_once "HondtElection.php";
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

    $representatives = [];

    for($i = 0;$i<$_POST["parties"];$i++){
        $representatives[$_POST["party-".$i]] = explode(",",$_POST["representatives-".$i]);;
    }

$blanks = (int)$arrayGeneral["Blanks"];
unset($arrayGeneral["Blanks"]);
unset($arrayGeneral["Nulls"]);

$hondtElection = new HondtElection($arrayGeneral,$blanks, $_POST['representatives']);
foreach ($hondtElection->getResult() as $key => $value) {
    echo $key . ": ";
    for($i = 0; $i < $value; $i++) {
        echo $representatives[$key][$i] . ",";
    }
    echo "<br/>";
}
//Som es putos amos.
?>

</body>
</html>