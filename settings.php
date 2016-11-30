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
if (!(isset($array[$user]) && $array[$user] == $password)) {
    header("Location: index.php");
    die();
}

function saveState($array){
    foreach($array as $key => $value){
        setcookie($key,$value, time()+30*24*3600);
    }
}

function returnState($name){
    return $_COOKIE[$name];
}

?>
<h1>Settings</h1>
<form action="settings2.php" method="post">
    <p><label>Number representatives <input type="number" name="representatives" min="1"/></label></p>
    <p><label>Number votes <input type="number" name="votes" min="1"/></label></p>
    <p><label>Number lists of candidates <input type="number" name="lists" min="1"/></label></p>
    <p><input type="submit" value="Submit"></p>
</form>
</body>
</html>