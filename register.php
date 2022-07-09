<?php
require_once("connection.php");

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['name'] && $_POST['email'] && $_POST['password'] && $_POST['dob']) {
        $sql = "SELECT email FROM users WHERE email = '".$_POST['email']."'";
        $result = mysqli_query($conn, $sql);
        if($result && mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO users (name, email, password, dob) values(
                '".$_POST['name']."',
                '".$_POST['email']."',
                '".sha1($_POST['password'])."',
                '".$_POST['dob']."'
            )";
            if(mysqli_query($conn, $sql)){
                $msg = "Register sucessfully. Please login now";   
            }else{
                $msg = "Something wrong. please try again.";
            }  
        }else{
            $msg = "Same email already exists.";
        }
    }else {
        $msg = "All field are required.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>responsive virtual doctor website design </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> Virtual Doctor. </a>

    <nav class="navbar">
        <a href="index.php#home">home</a>
        <a href="index.php#login">Login</a>
        <a href="register.php">Register</a>
        <a href="index.php#about">about</a>
        <a href="index.php#contactus">contact us</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->
    
<section class="login" id="login">

    <h1 class="heading"> <span>Register</span></h1>    

    <div class="row">

        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>

        <form action="" method="POST">
            <h3>Register</h3>
            
            <?php if($msg){ ?>
                <div><?=$msg?></div>
            <?php } ?>

            <input type="text" name="name" placeholder="your name" class="box" required>
            <input type="email" name="email" placeholder="your email" class="box" required>
            <input type="password" name="password" placeholder="your password" class="box" required>
            <input type="date" name="dob" class="box" required>
            <input type="submit" value="register" class="btn">
            <br/>
            <p>Have an account? <a href="index.php#login">Login Here</a>.</p>
        </form>
    </div>
</section>

<!-- login section ends -->
<p>If you are not redirected in five seconds, <a href="index.php">click here</a>.</p>
</body>
</html>