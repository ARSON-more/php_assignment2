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
    include('scripts.php');//script for the stats 
    _stats("login");//this funtion adds 1 to the stat tracker for the log in page

session_start();//this is where the sessions start

    if(!empty($_POST['username']) && !empty($_POST['password'])){{


        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    $sql ="select * from registration where UserName='$username'&& password = '$password'";//sets up whats going to be searched for in the database
    $sql2 ="select * from registration where UserName='$username'";//this is going to be used to check if the user exists in the database
    

    $rs = mysqli_query($dbconnect, $sql);//puts the query above into a function
    $error_rs=mysqli_query($dbconnect, $sql2);//puts the query above into a function
    if(!$rs){
    	die("Database connection failed: ". mysqli_error($dbconnect));
        errors("database connection failed");//this is an error funtion that typed the error into the error file
    }

    $num = mysqli_num_rows($rs);//this checks the number of rows that contain both the password and username into a veriable
    $num2 = mysqli_num_rows($error_rs);//this does the same as above but only looks for the username 


    if($num ==1){//if there 1 line in the database with both the username and password it means that the user entered the correct details
    	echo "You have now logged in";
        $_SESSION['name']= $username;//this is where the session name is set
        echo "\n hi". $_SESSION['name'];
        header("location: members.php");//this takes you to the members page
    }else if($num2==1){
        echo "welcome back ".$username."</br> sorry but your password is incorrect";//tells the user that theyre username is correct but password is wrong 
        errors("password incorrect");//logs the error
    } else{
    	echo "Username or Password is incorrect";
        errors("username or password incorrect");//sends an error to the error file 
    }

    mysqli_close($dbconnect);//closes the sql

}


    ?>

    </body>
</html>
