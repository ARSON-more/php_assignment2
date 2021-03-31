<html>
<head>
    <title>members</title>
</head>
<body>

	
<?php

include('scripts.php');//this is the stats scrips 
_stats("members");//this funtion adds 1 to the stat tracker for the log in page


session_start();
if($_SESSION['name'] =="") {//if the session name is empty it sends you to the log in page
    header("location: login.php");
}else{
    echo "hello ". $_SESSION['name']. " you are now logged in</br> would you like to see you stats?";//echos out session name which is the same as the username
    echo '</br> <a href="stats.php">been here before? look at your stats!</a>';//link to the stats page 
}
   

    ?>
    </body>
</html>