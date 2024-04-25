<?php
include"functions.php";

$db = db_conn();
$n=10;

$action = $_POST['submit'];

switch ($action) {
	case "login":
		//session_start();
		$username = validate($_POST['uname']);
		$pd = md5($_POST['password']);
		$status = "Active";

		if (empty($username)) {
			header("Location: ../index.php?error=User Name is required");
			exit();
		}
		else if(empty($pd)){
			header("Location: ../index.php?error=Password is required");
			exit();
		}
	
		else if(empty($db)){
			header("Location: ../index.php?error=session time due to security issues....!!!");
			exit();
			}
		else{
			$install = "select * from employees";
			$ret = $db->query($install);
			if(empty($row = $ret->fetchArray(SQLITE3_ASSOC))){
				$defaultuser = "INSERT INTO employees (idno,dob,gender,contact,email,username,password,position,name,status) VALUES('1','1/1/2000','male','01','admin@gmail.com','admin','admin','Administrator','admin','Active')";
				$addadmin = $db->exec($defaultuser);
			}
			else{
			$logfile ="INSERT INTO logfiles (username,password,level) VALUES('$username','$pd','Teacher')";
			$sql = "SELECT * from employees WHERE username like '$username' AND password like '$pd' AND status like '$status'";
			$res = $db->query($sql);
			
			if(empty($row = $res->fetchArray(SQLITE3_ASSOC))){
				header("Location: ../index.php?error= Invalid username or password");
				exit();
			}
			else{
				//session_start();
				if($row['username'] == $username and $row['password'] == $pd and $row['position'] == 'Administrator'){
					$retlogs = $db->exec($logfile);
					$_SESSION['id'] = $username;
					echo "<script>location.href='../admin/index.php?dashboard'</script>";
					}
				else if($row['username'] == $username and $row['password'] == $pd and $row['position'] == 'Receptionist'){ 
					$retlogs = $db->exec($logfile);
					$_SESSION['id'] = $username;
					echo "<script>location.href='../reception/index.php?dashboard'</script>";
					}
				else if($row['username'] == $username and $row['password'] == $pd and $row['position'] == 'Teacher'){ 
					$retlogs = $db->exec($logfile);
					$_SESSION['id'] = $username;
					echo "<script>location.href='../teachers/index.php?dashboard'</script>";
					}
				else{
					header("Location: ../index.php?error=session time due to security issues....!!!");
					exit();	
					}
				}
			}
		}
    break;
	case "register":
		$affino = $_POST['affino'];
		$cname = str_replace("'", "\'", $_POST['cname']);
		$phone = $_POST['phone'];
		$email = str_replace("'", "\'", $_POST['email']);
		$username = str_replace("'", "\'", $_POST['username']);
		$password = $_POST['password'];
		$password = md5($_POST['password']);
		$status = "Inactive";
		$user_type = "Customer";
		
		$sql = "SELECT * FROM `customer` WHERE `email`=? OR `phone`=? ";
		$query = $db->prepare($sql);
		$query->execute(array($email,$phone));
		$row = $query->rowCount();
		$fetch = $query->fetch();
			if($row > 0){
				echo "	<script>alert('You already av an existing account')</script>
						<script>window.location = '../index.php'</script>";
				}
			
			else{
				$Isql = "INSERT INTO customer (full_name, phone, email, username, password, user_type, status, affno)
			VALUES ('$cname', '$phone', '$email', '$username', '$password', '$user_type', '$status', '$affino')";
				$db->exec($Isql);
				$db = null;
				echo "<script>window.location = '../index.php'</script>";
				}
    
    break;
	
	case "Change":
		$id = str_replace("'", "\'", $_POST['userid']);
		$new_password = md5($_POST['new_password']);
		$sql = $db->query("UPDATE employees SET password = '$new_password' WHERE username = '$id'");
		$db = null;
		echo "
		<script>alert('Your password has been changed successfully!')</script>
		<script>window.location = '../index.php'</script>
		";
		logout();
		
	break;
	
	case "reset":
		if($_POST['myemail'] != "" || $_POST['myphone'] != ""){
    			$email = str_replace("'", "\'", $_POST['myemail']);
				$username = str_replace("'", "\'", $_POST['fusername']);
				$status ="Active";
				$newpd = getName($n);
				
				$sql = "SELECT * FROM `customer` WHERE `email`=? AND `username`=? AND `status`=?";
				$query = $db->prepare($sql);
				$query->execute(array($email,$username,$status));
				$row = $query->rowCount();
				$fetch = $query->fetch();
				if($row > 0) {
					$action ="reset";
					$npd = resetpd($n);
					$new_password = md5($npd);
					$sql = $db->query("UPDATE customer SET password = '$new_password' WHERE email = '$email' ");
					$db = null;
					echo "<script>window.location = '../include/mail.php?action=$action&cmail=$email&npd=$new_password'</script>";
				} 
				else{
					echo "
					<script>alert('Invalid account kindly contact us')</script>
					<script>window.location = '../index.php'</script>
					";
				}
			}
		
	break;
	
  default:
    echo "Invalid operation";
}

