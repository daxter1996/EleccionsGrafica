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
<h1>Settings 2</h1>
<form>
    <?php
    for ($i = 0; $i < $_POST['lists']; $i++) {
        ?>
        <p><label>Name <input type="text"></label></p>
        <p><label>Representatives <br/><textarea></textarea></label></p>
        <?php
    }
    ?>
</form>
</body>
</html>
