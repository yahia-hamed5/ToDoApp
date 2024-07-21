<?php
session_start(  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book App</title>
    <?php require_once("../../include/css/css.php") ?>

</head>
<body>
<?php require_once("../../include/nav/nav.php") ?>
<?php echo "this is Home page" ;

echo'<pre>';
print_r( $_SESSION );
echo'</pre>';
?>
<?php require_once("../../include/js/js.php") ?>
</body>
</html>