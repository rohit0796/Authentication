<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM `students_details`.`details` WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("location: signup.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
    <title>Index</title>
    <style>
        a{
    margin: 6px 15px;
}
body
        {
            font-family: 'Libre Baskerville', serif;
            height:98vh;
            background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 28%, #80D0C7 66%);

        }
 .cont {
            font-size:20px;
            margin: auto;
            background: #80D0C7;
            margin-top: auto;
            text-align: center;
            width: 40%;
            padding: 10px;
            margin-top: auto;
            border-radius: 15px;
            border: 2px solid black;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        }
        .con {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        h1{
    font-family: 'Anton', sans-serif;
}
    </style>
  </head>
  <body>
    <div class="con">

        <div class="cont">
            <h1>Welcome <?php echo $row["name"]; ?></h1>
            <table align="center" cellspacing="15px">
            <tr>
                <td>Name:</td>
                <td><?php echo $row["name"]; ?></td>
            </tr>
            <tr>
                <td>regd no:</td>
                <td><?php echo $row["regd"]; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $row["email"]; ?></td>
            </tr>
            <tr>
                <td>Date Of Birth:</td>
                <td><?php echo $row["dob"]; ?></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><?php echo $row["gender"]; ?></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><?php echo $row["mob"]; ?></td>
            </tr>
            <tr>
                <td>Hobbies:</td>
                <td><?php echo $row["hobbie"]; ?></td>
            </tr>
            <tr>
                <td>Branch:</td>
                <td><?php echo $row["branch"]; ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="logout.php">Logout</a></td>
                <td><a href="cpass.php">change password</a></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>