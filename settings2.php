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
<form>
    <?php
        for ($i = 0; $i < $_POST['lists']; $i++) {
        ?>
        <p><label>Name <input type="text"></label>
        <label>Representatives<textarea></textarea></label></p>
        <?php
        }
    ?>
</form>
</body>
</html>
