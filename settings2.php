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
function saveState($text){
    setcookie("settings1", $text, time()+30*24*3600);
}

if(isset($_POST['exit'])) {
    $text = "votes=>" . $_POST["votes"] . ",parties=>" . $_POST["parties"] . ",towns=>" . $_POST["towns"] . ",representatives=>" . $_POST["representatives"];
    //echo $text;
    saveState($text);
    header("Location: index.php");
    die();
}
?>
<h1>Representatives</h1>
<form action="votes.php" method="post">
    <table>

    <?php
        $tableInfo = ["Blanks","Nulls"];
        echo "<input type='hidden' value=".$_POST['towns']." name='towns'/>";
        echo "<input type='hidden' value=".$_POST['parties']." name='parties'/>";


        for($i = 0;$i<$_POST["parties"];$i++){
            array_push($tableInfo,$_POST["party-".$i]);
            echo "<input type='hidden' value=".$_POST["party-".$i]." name='party-". $i ."'/>";
        }

        for ($i = 0; $i <= $_POST['towns']; $i++) {
            echo "<tr>";
            echo "<td><input name=".$i."-". 0 ."/></td>";
            if($i == 0){
                for($j = 0;$j<$_POST['parties']+2;$j++){
                    echo "<th>" . $tableInfo[$j] ."</th>";
                }
            }else {
                for ($j = 0; $j <= $_POST['parties']+1; $j++) {
                    echo "<td><input type='number' min='0' name=" . $i . "-" . ($j+1) . "/></td>";
                }
            }
            echo "</tr>";
        }
    ?>
    </table>
    <p><input type="submit" name="exit" value="Vota"/></p>
</form>
</body>
</html>
