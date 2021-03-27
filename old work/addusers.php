<html>
    <head>
        <title>DBInsert</title>
    </head>
    <body>
        <form name="adduser" method="POST" action="dbinsert.php">
            First name: <input name="firstname" type="text"><br>
            Last name: <input name="lastname" type="text"><br>
            Username: <input name="username" type="text"><br>
            Password: <input name="password" type="password"><br>
            <input type="submit" value="submit">
        </form>      
    
        <?php
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            if(empty($firstname) || empty($lastname) || empty($username) || empty($password)) {
                echo "Please fill in all the boxes";
            }
            else {
                include('dbconnect.php');
            }
        

        
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
        ?>

    </body>
</html>

