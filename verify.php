<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("db.php");

$data = null;

if(isset($_GET['enrollment'])){

    $enrollment = $_GET['enrollment'];

    $sql = "SELECT * FROM students WHERE enrollment='$enrollment'";
    $q = mysqli_query($conn, $sql);

    if($q){
        $data = mysqli_fetch_assoc($q);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Certificate Verification</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f2f2;
        }

        .box{
            width:800px;
            margin:40px auto;
            background:#fff;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px #ccc;
        }

        h2{
            text-align:center;
            color:green;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        td{
            border:1px solid #ddd;
            padding:10px;
        }

        .photo{
            width:120px;
            height:140px;
            object-fit:cover;
        }

    </style>
</head>
<body>

<div class="box">

<h2>Certificate Verification Result</h2>

<?php if($data){ ?>

<table>

<tr>
    <td><b>Enrollment</b></td>
    <td><?php echo $data['enrollment']; ?></td>
</tr>

<tr>
    <td><b>Name</b></td>
    <td><?php echo $data['name']; ?></td>
</tr>

<tr>
    <td><b>Father Name</b></td>
    <td><?php echo $data['father_name']; ?></td>
</tr>

<tr>
    <td><b>Course</b></td>
    <td><?php echo $data['course_name']; ?></td>
</tr>

<tr>
    <td><b>Result</b></td>
    <td><?php echo $data['result']; ?></td>
</tr>

<tr>
    <td><b>Photo</b></td>
    <td>
        <?php if(!empty($data['photo'])){ ?>
            <img class="photo" src="uploads/<?php echo $data['photo']; ?>">
        <?php } else { ?>
            No Photo
        <?php } ?>
    </td>
</tr>

</table>

<?php } else { ?>

<h3 style="color:red; text-align:center;">No Record Found</h3>

<?php } ?>

</div>

</body>
</html>