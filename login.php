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
        <a href="registration.php">Not a member? Click here to register!</a>
    </form>

    <?php

    require_once('dbconnect.php');

    if(!empty($_POST['username']) && !empty($_POST['password'])){{

    
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    $sql ="select * from registration where UserName='$username'&& password = '$password'";

    $rs = mysqli_query($dbconnect, $sql);
    if(!$rs){
    	die("Database connection failed: ". mysqli_error($dbconnect));
    }

    $num = mysqli_num_rows($rs);

    
    if($num ==1){
    	echo "You have now logged in";
    }else{
    	echo "Username or Password is incorrect";
    }

    mysqli_close($dbconnect);
}

    
    ?>

    </body>
</html>