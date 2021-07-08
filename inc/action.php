<?php  


// Include the database configuration file
require '../config-site.php';

if($_GET['act'] === 'setOrder'){

		global $conn;	

		$q = "INSERT INTO `orders` (`type`, `number_table`, `order`, `total`) VALUES (
		'".$_POST['type']."', 
		'".$_POST['table']."', 
		'".$_POST['table']."', 
		'".$_POST['total']."'
		)";
		if(mysqli_query($conn, $q)){
			if(isset($_POST['table'])){
				$q = "UPDATE tables SET active='true' WHERE number = '".$_POST['table']."' ";
				if(mysqli_query($conn, $q)){
					echo 'ok';
				}
			}else{
				echo 'ok';
			}

			
		}


}

if($_GET['act'] === 'setCat'){
		global $conn;	
		$q = "INSERT INTO `categories` (`name`, `icon`) VALUES (
		'".$_POST['name']."', 
		'".$_POST['icon']."'
		)";

		if(mysqli_query($conn, $q)){
			echo 'ok';
		}
}




if($_GET['act'] === 'activeCat'){
		global $conn;	
		$q = "UPDATE categories SET active='". $_POST['active']."' WHERE ID = ".$_POST['id']." ";
		if(mysqli_query($conn, $q)){
			echo 'ok';
		}
}





if($_GET['act'] === 'setUser'){
    global $conn;	
	$q = "SELECT * FROM `users` WHERE `user_name` = '".$_POST['name']."'";		
	$query = $conn->query($q);
	if($query->num_rows > 0){
		$res = 'exist';
	}else{
		$q2 = "INSERT INTO `users` (`user_name`, `user_code`) VALUES (
			'".$_POST['name']."', 
			'".$_POST['code']."'
			)";
			if(mysqli_query($conn, $q2)){
				$res = 'ok';
		}
	}
	echo $res;
}

if($_GET['act'] === 'deleteUser'){
    global $conn;	
	$q2 = "DELETE FROM `users` WHERE ID = '".$_POST['id']."'";
	if(mysqli_query($conn, $q2)){
			$res = 'ok';
	}
	echo $res;
}

if($_GET['act'] === 'updateUser'){
	global $conn;	
	$q = "UPDATE users SET user_name='". $_POST['name']."', user_code='". $_POST['code']."' WHERE ID = ".$_POST['id']." ";
	if(mysqli_query($conn, $q)){
		echo 'ok';
	}
}



?>