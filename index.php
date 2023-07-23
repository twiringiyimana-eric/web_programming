<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="images/style.css">
</head>
<body>
    
    <body>
    <section>
        <form method="POST">
            <h1>Login</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="username"  name="username" required>
                <label for="">Username</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>
            </div>
            <button type="submit " name="submit">Log in</button>
            <div class="register">
                <p>Don't have a account <a href="#">Register</a></p>
            </div>
        </form>
    </section>
</body>
</body>
</html><?php

if(isset($_POST['submit'])){
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"quick");
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($conn,"select * from users where username='$username' and password='$password'");
$count=mysqli_num_rows($query);
$row=mysqli_fetch_array($query);
if($count>0){
session_start();
 	$_SESSION['username']=$row['username'];
	echo"<script>alert('login successfully')</script>";
	echo"<script>location.href='dashboard.php'</script>";
	}
	else{
		echo"<script>alert('incorrect Username or Password')</script>";
		echo"<script>location.href='index.php'</script>";
}}?>