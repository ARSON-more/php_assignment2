<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form name="adduser" method="POST" action="registration.php">
        First name: <input name="firstname" type="text" required><br>
        Last name: <input name="lastname" type="text" required><br>
        Username (Email Address): <input name="username" type="text" ><br>
        Password: <input name="password" type="password" required><br><br>
        <input type="submit" value="Sign Up"><br><br><br>
        <a href="login.php">Already a member? Click here to login!</a></br>
        <a href="stats.php">been here before? look at your stats!</a>
    </form>

    <?php



    include('dbconnect.php');//this is the
    include('scripts.php');//this is the stats scrips
    _stats("registration");//this funtion adds 1 to the stat tracker for the log in page


    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['password'])){{//checks if the form isnt empty

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }


    if(empty($firstname) || empty($lastname) || empty($username) || empty($password)) {
        echo "Please fill in all the boxes";
        errors("please fill in all the boxes");//logs the error


    }else{
        include('dbconnect.php');
    }

	if(strlen($password) < 6){
		echo "Please enter a password that has six or more characters.";
    errors("password is too short");//logs the error

	}else{


     $email_format = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if (!preg_match($email_format, $username)) {//checks if the email maches the format above
         echo "Invalid email \n please refresh the page and try again \n your email is too short";
         errors("invalid email");//logs the error

       }
         else {//if the email is in the correct format it will continue signing you up





    $sql = "insert into registration (firstname, lastname, username, password)
    values('$firstname', '$lastname', '$username', '$password')";

    $rs = mysqli_query($dbconnect, $sql);

    if(!$rs) {//if the connection failes an error is written to the file
        die("Database connection failed: " . mysqli_error($dbconnect));
        errors("database connection failed");
    }


    mysqli_close($dbconnect);


    if($rs) {//if the connection works it adds the new user
        echo "New user " . $username . " added to the database";
    }

}
	}}//this is closing the password lengh and pregmatch


    ?>

    </body>
</html>
