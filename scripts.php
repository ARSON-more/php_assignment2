<html>
<head>
    <title>scripts</title>
</head>
<body>
   
    <?php



$default_stats="0";//simply creating a file wont work as a blank file cant be iterated from . a value needs to be present 

$stats_members="members_stats.txt";
$stats_login="login_stats.txt";
$stats_registration="registration_stats.txt";

function errors($errors_){//this function takes what ever you type into the brackets and and writes the : date , ip address and then the error you typed in 
	$date=date("Y-m-d h:i:sa");
	$time=time("h:i:sa");
	$ip_address = $_SERVER['REMOTE_ADDR'];//this is how you get the ip address
	$myfile= "error.txt";
	$file= fopen($myfile, "a");
	$stringdata = $date." ".$ip_address." ".$errors_."\n";//assembled what will be written into the text file and puts it into a veriable 
	fwrite($file,$stringdata);
  };



//these check if the files exist and if they dont they create the files and put 0 in them. 
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
		//this function takes the number that is in the appropriet text file and increments it every time the page is ran 

		if($page_name == "login"){//page name is the argument for the function and so it assosiated "login" with loginstats.txt
		$value = "";//since the same veriable is used for all pages if the user has visited another page this value will be set to that instead of empty and so it needs to be reset each time.
		fopen("login_stats.txt", "a+");//opens the file to append 
		$file = file("login_stats.txt");//sets the file to a veriable 

		foreach($file as $value){//takes each value from a file and sets it to $value but since theres only 1 item in this file it sets the number as $value 
			$value++;//takes the number in the file and adds 1 
			file_put_contents("login_stats.txt",$value);//puts the content into the file 
			};
		}
		//most of the code is the same the only thing that changes is the page name and file location/name

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

	function show_stats(){//thsi simply creates 3 messeges that read the file number out and put that number into a sentence 
	echo "you have visited the members page ", file_get_contents("members_stats.txt"), " times</br>";
	echo "you have visited the login page ", file_get_contents("login_stats.txt"), " times</br>";
	echo "you have visited the registration page ", file_get_contents("registration_stats.txt"), " times</br>";


	}

	



    ?>

    </body>
</html>
