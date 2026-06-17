<?php

$conn=mysqli_connect("localhost","root","","nsvtc_db");

$data="";

if(isset($_POST['check']))
{

$enrollment=$_POST['enrollment'];

$q=mysqli_query(
$conn,
"SELECT * FROM students WHERE enrollment='$enrollment'"
);

if(mysqli_num_rows($q)>0)
{

$row=mysqli_fetch_assoc($q);

if($row['result']=="PASS")
{

$data="

<h2 style='color:green;'>PASS</h2>

<p>Name: ".$row['name']."</p>

<p>Sector: ".$row['sector']."</p>

<br>

<a href='certificate.php?enrollment=".$row['enrollment']."'>


<button
style='
background:darkred;
color:white;
padding:10px 20px;
border:none;
cursor:pointer;
'>

Download Certificate

</button>

</a>

";

}

else
{

$data="

<h2 style='color:red;'>FAIL</h2>

<p>Name: ".$row['name']."</p>

<p>Sector: ".$row['sector']."</p>

";

}

}

else
{

$data="

<h2 class='fail'>

Record Not Found

</h2>

";

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>NSVTC Result</title>

<style>

body{

font-family:Arial;
background:#f4f4f4;
text-align:center;
padding-top:80px;

}

.box{

width:500px;
margin:auto;
background:white;
padding:40px;
border-radius:10px;

}

input{

width:80%;
padding:10px;

}

button{

background:darkred;
color:white;
border:none;
padding:10px 20px;
cursor:pointer;

}

.fail{

color:red;
font-size:32px;
font-weight:bold;

}

</style>

</head>

<body>

<div class="box">

<h1>NSVTC Result</h1>

<form method="POST">

<input
type="text"
name="enrollment"
placeholder="Enter Enrollment"
required

>

<br><br>

<button name="check">

Check Result

</button>

</form>

<br>

<?php

echo $data;

?>

</div>

</body>

</html>