<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
</head>
<body>
    <?php
    $array = ["Joel" => "esselte15", "Neus" => "esselte14", "Xavier" => "esselte13", "Jesus" => "esselte12"];
    $user = $_POST["user"];
    $password = $_POST["password"];
    if (empty($array[$user]) || $array[$user] != $password) {
        header("Location: index.php");
        die();
    }

    function returnState($name,$nomCerca){
        $string = $_COOKIE[$nomCerca];
        $array1 = explode(",",$string);
        $array2 = [];
        foreach ($array1 as $item) {
            $separa = explode("=>",$item);
            $array2[$separa[0]] = $separa[1];
        }
        if(isset($array2[$name]))
            return $array2[$name];
        else
            return 1;
    }
    ?>
    <h1>Settings</h1>
    <form action="settings2.php" method="post">
        <p><label>Number of Votes <input type="number" name="votes" min="1" value="<?php echo returnState('votes', 'settings1');?>"/></label></p>
        <p><label>Parties <input type="number" name="parties" min="1" value="<?php echo returnState('parties', 'settings1');?>"/></label></p>
        <p><label>Number of towns <input type="number" name="towns" min="1" value="<?php echo returnState('towns', 'settings1');?>"/></label></p>
        <p><label>Representatives <input type="number" name="representatives" min="1" value="<?php echo returnState('representatives', 'settings1');?>"/></label></p>
        <p><input type="submit" name="votes" value="Introduce Votes"/>
        <hr/>
        <p><input type="submit" name="exit" value="Log Out"/></p>
    </form>
    <input type="submit" name="representatives" onclick="mostraForm()" value="Introduce Representatives"/></p>
    <div id="repForm" style="display: none">
        asdfasdf
        <form action="settings2.php" method="post">


        </form>
    </div>
<script style="text/javascript" src="javascript.js"></script>
</body>
</html>