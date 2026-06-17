<!DOCTYPE html>
<html>

<head>

<title>NSVTC</title>

<meta charset="utf-8">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#f5f5f5;
}



/* HEADER */

.header{

height:90px;

background:#8b0000;

display:flex;

justify-content:space-between;

align-items:center;

padding:0 50px;

}


.left{

display:flex;

align-items:center;

}


.left img{

width:65px;

height:65px;

border-radius:50%;

object-fit:cover;

margin-right:15px;

background:white;

}


.left h1{

color:white;

font-size:28px;

}


.left p{

color:white;

}


.menu a{

color:white;

text-decoration:none;

margin-left:35px;

font-size:20px;

}


.menu a:hover{

color:yellow;

}





/* HERO */

.hero{

height:620px;

background:

linear-gradient(
rgba(0,0,0,.45),
rgba(0,0,0,.45)
),

url("bhanner.jpg");

background-size:cover;

background-position:center;

display:flex;

flex-direction:column;

justify-content:center;

align-items:center;

color:white;

text-align:center;

}


.hero h2{

font-size:90px;

}


.hero p{

font-size:36px;

margin-top:20px;

}


.btn{

margin-top:40px;

background:#8b0000;

color:white;

padding:18px 45px;

text-decoration:none;

font-size:24px;

border-radius:8px;

}


.btn:hover{

background:black;

}





/* SERVICES */

.section{

padding:70px;

}


.section h2{

text-align:center;

color:#8b0000;

font-size:45px;

margin-bottom:50px;

}


.cards{

display:flex;

justify-content:center;

gap:30px;

flex-wrap:wrap;

}


.card{

width:280px;

background:white;

padding:35px;

border-radius:10px;

box-shadow:0 0 15px rgba(0,0,0,.2);

text-align:center;

}


.card h3{

color:#8b0000;

margin-bottom:15px;

}




.footer{

background:black;

color:white;

text-align:center;

padding:30px;

}

</style>

</head>

<body>



<div class="header">

<div class="left">

<img src="logo.jpeg">

<div>

<h1>NSVTC</h1>

<p>Skill Development Portal</p>

</div>

</div>


<div class="menu">

<a href="index.php">Home</a>

<a href="result.php">Result</a>

<a href="certificate.php">Certificate</a>

</div>

</div>




<div class="hero">

<h2>NSVTC</h2>

<p>National Skill & Vocational Training</p>

<a href="result.php" class="btn">

Check Result

</a>

</div>





<div class="section">

<h2>Student Services</h2>


<div class="cards">


<div class="card">

<h3>Result</h3>

<p>Check Student Result</p>

</div>


<div class="card">

<h3>Certificate</h3>

<p>Download Certificate</p>

</div>


<div class="card">

<h3>Verification</h3>

<p>Verify Student Details</p>

</div>


</div>

</div>




<div class="footer">

© 2026 NSVTC

</div>



</body>

</html>