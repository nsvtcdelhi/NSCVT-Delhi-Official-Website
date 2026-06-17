<?php

$conn=mysqli_connect("localhost","root","","nsvtc_db");

$enrollment=$_GET['enrollment'];

$q=mysqli_query($conn,"SELECT * FROM students WHERE enrollment='$enrollment'");

$row=mysqli_fetch_assoc($q);

?>

<!DOCTYPE html>
<html>

<head>

<title>NSVTC Certificate</title>

<style>

body{
margin:0;
padding:40px;
background:#eee;
font-family:Arial;
}

.certificate{

width:800px;
margin:auto;

background:white;

border:8px solid darkred;

padding:50px;

text-align:center;

position:relative;
}

.logo{

width:120px;

display:block;

margin:auto;

margin-bottom:20px;

}

h1{
color:darkred;
}

.name{
font-size:50px;
font-weight:bold;
}

.line{
font-size:24px;
margin:15px;
}

.pass{
color:green;
font-size:40px;
font-weight:bold;
}

.download{

padding:12px 25px;

background:darkred;

color:white;

border:none;

cursor:pointer;

}

</style>

</head>

<body>

<div class="certificate">

<!-- LOGO -->

<img
src="assets/logo.png"
class="logo"
>

<h1>NSVTC CERTIFICATE</h1>

<br>

<p>This is to certify that</p>

<div class="name">

<?php echo $row['name']; ?>

</div>

<br>

<div class="line">

Enrollment Number

<br>

<b>

<?php echo $row['enrollment']; ?>

</b>

</div>

<br>

<div class="line">

Father Name

<br>

<b>

<?php echo $row['Father Name']; ?>

</b>

</div>

<br>

<div class="line">

Mother Name

<br>

<b>

<?php echo $row['Mother Name']; ?>

</b>

</div>

<br>

<div class="line">

Course

<br>

<b>

<?php echo $row['Course Name']; ?>

</b>

</div>

<br>

<div class="line">

Duration

<br>

<b>

<?php echo $row['Duration']; ?>

</b>

</div>

<br>

<div class="line">

Sector

<br>

<b>

<?php echo $row['sector']; ?>

</b>

</div>

<br>

<div class="pass">

<?php echo $row['result']; ?>

</div>

<br>

<button
onclick="window.print()"
class="download"
>

Download PDF

</button>

</div>

</body>

</html>