<?php
session_start();

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['button_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>

<!doctype html>
<html>
<head></head>
<body>
<h1>Wygląda na to że nastąpił błąd i nie masz odpowienich uprawnień!!!</h1>
<form method='post' action="">
    <input type="submit" value="Wróć do logowania" name="button_logout">
</form>
</body>
</html>