<html>
<head>
    <title>Registration</title>
</head>
<body>
   
    <?php



$default_stats="0";

$stats_members="members_stats.txt";
$stats_login="login_stats.txt";
$stats_registration="registration_stats.txt";



	if (!file_exists("members_stats.txt")){
		file_put_contents("members_stats.txt",$default_stats);
		

	}
	if (!file_exists("login_stats.txt")){
		file_put_contents("login_stats.txt",$default_stats);
		

	}
	if (!file_exists("registration_stats.txt")){
		file_put_contents("registration_stats.txt",$default_stats);
		

	}
	
	
	
	function _stats($page_name){

		if($page_name == "login"){
		$value = "";
		fopen("login_stats.txt", "a+");
		$file = file("login_stats.txt");

		foreach($file as $value){
			$value++;
			file_put_contents("login_stats.txt",$value);	
			};
		}

		if($page_name == "members"){
			$value = "";
			fopen("members_stats.txt", "a+");
			$file = file("members_stats.txt");
	
			foreach($file as $value){
				$value++;
				file_put_contents("members_stats.txt",$value);
			
				};
			}
		
		if($page_name == "registration"){
			$value = "";
			fopen("registration_stats.txt", "a+");
			$file = file("registration_stats.txt");
	
			foreach($file as $value){
				$value++;
				file_put_contents("registration_stats.txt",$value);
				
				};
			}
		


	}

	function show_stats(){
	echo "you have visited the members page ", file_get_contents("members_stats.txt"), " times</br>";
	echo "you have visited the login page ", file_get_contents("login_stats.txt"), " times</br>";
	echo "you have visited the registration page ", file_get_contents("registration_stats.txt"), " times</br>";


	}

	
    

    ?>

    </body>
</html>
