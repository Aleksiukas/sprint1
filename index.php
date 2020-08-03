
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/newdir.css">
    <title>Document</title>
</head>
<body>     
<?php

session_start();

$username = 'user';
$password = 'admin';

$random1 = 'secret_key1';
$random2 = 'secret_key2';

$hash = md5($random1.$pass.$random2); 

$self = $_SERVER['REQUEST_URI'];

if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}

if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {

	?>
		<button class="log" id="log" onclick="window.location.href='?logout=true';">
        Logout
    </button>
		
			
    <?php
    include 'Url.php';
    include 'nav.php';
    include 'newdir.php';
}

else if (isset($_POST['submit'])) {

	if ($_POST['username'] == $username && $_POST['password'] == $password){
	
		//IF USERNAME AND PASSWORD ARE CORRECT SET LOG-IN 
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
		
	} else {
		
		//  ERROR
		display_login_form();
		echo '<p>Username or password is invalid</p>';
		
	}
}	
	
else { 

	display_login_form();

}

function display_login_form(){ ?>
<center>
    <div id="mainbtn">
        <h1>Login</h1>
        <form action="<?php echo $self; ?>" method='post'>
            <input type="text" name="username" id="username" class="text" placeholder="username"><br><hr><br>
            <input type="password" name="password" id="password" class="text" placeholder="password"><br><hr><br>
            <input type="submit" name="submit" value="submit" id="logn">
        </form>	
    </div>
</center>
    <?php
}
?>
</body>
</html>