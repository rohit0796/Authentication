<?php
require "config.php";
$em=false;
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["submit"])){
$email = $_POST['email'];
$pass = $_POST['password'];
$sql=mysqli_query($con,"SELECT * FROM `students_details`.`details` where email='$email' AND pass='$pass'");
$row = mysqli_fetch_assoc($sql);
if(mysqli_num_rows($sql)>0)
{
    $_SESSION["login"] = true;
    $_SESSION["id"] = $row["id"];
    header('location:index.php');
}
else
{
   $em=true;
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:ital@1&display=swap"
        rel="stylesheet">
    <title>login</title>
    <style>
        td {
            padding: 10px;
        }

        h1 {
            font-family: 'Anton', sans-serif;
        }

        tr {
            width: 50vw;
        }

        input {

            margin: 2px;
            border-radius: 2px;
            padding: 5px;
            /* width: 10%; */
        }

        table {
            border: 2px solid black;
            border-radius: 5px;
            background: #80D0C7;
            width: 500px;
        }

        button {
            margin: 10px;
            padding: 5px 15px;
            border-radius: 10px;
            transition: transform .2s ease-in-out;
            background: #0093E9;

        }

        button:hover {
            background: blueviolet;
            color: white;
            transform: scale(1.1);
        }

        body {
            font-family: 'Libre Baskerville', serif;
            height:98vh;
            background-repeat: no-repeat;
            background-color: #80D0C7;
            background-image: linear-gradient(160deg, #80D0C7 17%, #0093E9 70%);


        }

        .cont {
            font-size: 20px;
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

        a {
            margin: 6px 15px;
            font-size: 15px;
        }

        .tab {
            border: none;
            background: #80D0C7;
             margin: auto;   
                 }

        input {
            margin: 2px;
            border-radius: 10px;
            padding: 10px;
            width: 80%; 
        }
        .button {
            text-align: center;
        }
.tab p{
    text-align: left;
    margin-left: 45px;
    margin-bottom: 5px;
}
/* .tab a{
    text-align: left;
    margin-left: 45px;
    margin-bottom: 5px;
} */
        .con {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        span{
            font-size: 15px;

        }
        .pass{
            text-align: left;
            margin-left: 45px;
        }
    </style>
</head>

<body>
    <div class="con">
        <div class="cont">
            <div style="text-align:center;">
                <h1>Log in</h1>
            </div>
            <form action="login.php" method="post">
                <div >
                    <div class="tab">
                        <div>
                            <p>Email:</p>
                            <input type="text" placeholder="enter your email" name="email">
                        </div>
                       <div>
                           <p>Password:</p>
                           <input type="password" placeholder="enter your password" name="password">
                        </div> 
                    </div>
                </div>
                <div class="pass">
                    <a href="fpass.php">forgot Password?</a><br>
                </div>
                <?php if($em==true)
                {
                    echo
                        "<p>Incorrect password or email id </p>";
                }
                ?>
                <button type="submit" name="submit">Submit</button>
            </form>
           <span> If you dont have an account</span><a href="signup.php">Sign up</a>
        </div>
    </div>
</body>

</html>