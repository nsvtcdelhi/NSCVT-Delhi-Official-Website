<?php
session_start();

$msg = "";

if(isset($_POST['login'])){

    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Admin Login
    if($user=="admin" && $pass=="12345"){
        $_SESSION['admin']=$user;
        header("Location: admin/");
        exit;
    }else{
        $msg="Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>NSVTC Login</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f3f3f3;
}

.box{
width:400px;
background:white;
padding:40px;
margin:100px auto;
border-radius:10px;
box-shadow:0 0 20px rgba(0,0,0,.15);
text-align:center;
}

h1{
color:darkred;
}

input{
width:100%;
padding:14px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:14px;
background:darkred;
color:white;
border:none;
font-size:18px;
cursor:pointer;
border-radius:5px;
}

button:hover{
background:#7d0000;
}

.error{
color:red;
margin-bottom:15px;
}

</style>

</head>

<body>

<div class="box">

<h1>NSVTC LOGIN</h1>

<?php
if($msg!=""){
echo "<div class='error'>$msg</div>";
}
?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required
>

<input
type="password"
name="password"
placeholder="Password"
required
>

<button name="login">
Login
</button>

</form>

</div>

</body>
</html>