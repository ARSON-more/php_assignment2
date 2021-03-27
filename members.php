<html>
<head>
    <title>members</title>
</head>
<body>
	
<h1> hiiii </h1>
    <?php
session_start();
if($_SESSION['name'] =="") {
    header("location: login.php");
}else{
    echo "hello". $_SESSION['name'];
}
   

    ?>
    </body>
</html>