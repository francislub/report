<!DOCTYPE html>
<html>
<head>
  	<title>Kiriti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Font Awesome -->
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../include/css/style.css">
</head>
  
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }

}
</style>

<body>
<div class="container col-md-4 p-6">	 
<form action="include/action.php" method="POST">
  <div class="imgcontainer">
    <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
	<div class="bg-danger text-light text-center">
    <p class="error">
		<?php if(isset($_GET['error'])){ ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
	</p>
    </div>
	<label>Username</label>
    <input type="text" id="uname" name="uname" placeholder="Username"><br>

    <label>Password</label>
    <input type="password" id="password" name="password" minlength="8" placeholder="Password"><br>

    <button type="submit" name="submit" value="login">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <div class="row">
		<div class="col text-center">
		  <input type="checkbox" onclick="showpwd()">Show Password
		</div>
		<div class="col text-right">
		  <a href="#">Forgot password?</a>
		</div>
	</div>
  </div>
  </div>
</div>
</form>
</div>
</body>
</html>

<script>
function showpwd() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
</script>