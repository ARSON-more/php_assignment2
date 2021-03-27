<html>
<head>
    <title>Login</title>
</head>
<body>
	<h2>Login</h2>
    <form name="adduser" method="POST" action="login.php"><br>
        Username (Email Address): <input name="username" type="text" required><br>
        Password: <input name="password" type="password" required><br><br>
        <input type="submit" value="Log In"><br><br><br>
        <a href="registration.php">Not a member? Click here to register!</a></br>
        <a href="stats.php">been here before? look at your stats!</a>
    </form>

    <?php

    include('dbconnect.php');
    include('stats_script.php');
    _stats("login");

session_start();//this is where the sessions start

    if(!empty($_POST['username']) && !empty($_POST['password'])){{


        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    $sql ="select * from registration where UserName='$username'&& password = '$password'";

    $rs = mysqli_query($dbconnect, $sql);
    if(!$rs){
    	die("Database connection failed: ". mysqli_error($dbconnect));
        errors("database connection failed");
    }

    $num = mysqli_num_rows($rs);


    if($num ==1){
    	echo "You have now logged in";
        $_SESSION['name']= $username;//this is where the session name is set
        echo "\n hi". $_SESSION['name'];
        echo "<a href='members.php'>members</a>";
    }else{
    	echo "Username or Password is incorrect";
        errors("username or password incorrect");
    }

    mysqli_close($dbconnect);

}


    ?>

    </body>
</html>
