<?php
$array = ["Joel" => "esselte15", "Neus" => "esselte14", "Xavier" => "esselte13", "Jesus" => "esselte12"];
$user = $_POST["user"];
$password = $_POST["password"];
if (empty($array[$user]) || $array[$user] != $password) {
    header("Location: index.php");
    exit();
}
?>
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
function returnState($name, $nomCerca)
{
    $string = $_COOKIE[$nomCerca];
    $array1 = explode(",", $string);
    $array2 = [];
    foreach ($array1 as $item) {
        $separa = explode("=>", $item);
        $array2[$separa[0]] = $separa[1];
    }
    if (isset($array2[$name]))
        return $array2[$name];
    else
        return 1;
}

?>
<h1>Settings</h1>
<form action="settings2.php" method="post">
    <p><label>Number representatives <input type="number" name="representatives" min="1"
                                            value="<?php echo returnState('representatives', 'settings1'); ?>"/></label>
    </p>
    <p><label>Number votes <input type="number" name="votes" min="1"
                                  value="<?php echo returnState('votes', 'settings1'); ?>"/></label></p>
    <p><label>Number lists of candidates <input type="number" name="lists" min="1"
                                                value="<?php echo returnState('lists', 'settings1'); ?>"/></label></p>
    <p><input type="submit" name="submit" value="Submit"/> <input type="submit" name="exit" value="Exit"/></p>
</form>
</body>
</html>