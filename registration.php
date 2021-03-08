<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form name="adduser" method="POST" action="registration.php">
        First name: <input name="firstname" type="text" required><br>
        Last name: <input name="lastname" type="text" required><br>
        Username (Email Address): <input name="username" type="text" required><br>
        Password: <input name="password" type="password" required><br><br>
        <input type="submit" value="Sign Up"><br><br><br>
        <a href="login.php">Already a member? Click here to login!</a>
    </form>

    <?php

    require_once('dbconnect.php');
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['password'])){{

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    
    
    if(empty($firstname) || empty($lastname) || empty($username) || empty($password)) {
        echo "Please fill in all the boxes";
    }else{
        include('dbconnect.php');
    }
	
	if(strlen($password) < 6){
		echo "please refresh the page and try again";
	}else{


    $sql = "insert into registration (firstname, lastname, username, password)
    values('$firstname', '$lastname', '$username', '$password')";

    $rs = mysqli_query($dbconnect, $sql);

    if(!$rs) {
        die("Database connection failed: " . mysqli_error($dbconnect));
    }

        
    mysqli_close($dbconnect);
    

    if($rs) {
        echo "New user " . $username . " added to the database";
    }

}
	}//this is closing the password lengh

    
    ?>

    </body>
</html>