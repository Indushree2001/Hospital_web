<?php
require_once("connection.php");

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['email'] && $_POST['password']) {
        $sql = "SELECT * FROM users WHERE email = '".$_POST['email']."' AND 
            password = '".sha1($_POST['password'])."' ";
        $result = mysqli_query($conn, $sql);
        if($result && mysqli_num_rows($result) > 0){
            $msg = "Login sucessfully.";   
        }else{
            $msg = "Invalid Email or Password.";
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
        <a href="#home">home</a>
        <a href="#login">Login</a>
        <a href="register.php">Register</a>
        <a href="#about">about</a>
        <a href="#contactus">contact us</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="image">
        <img src="image/home-img.svg" alt="">
    </div>

    <div class="content">
        <h3>stay safe, stay healthy</h3>
        <p><b>Health is Wealth</b>.Take care of your health at inside your home.</p>
        <a href="register.php" class="btn"> Register <span class="fas fa-chevron-right"></span> </a>
    </div>

</section>

<!-- home section ends -->

<!-- login section starts   -->

<section class="login" id="login">

    <h1 class="heading"> <span>Login</span></h1>    

    <div class="row">

        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>

        <form action="" method="POST">
            <h3>Login</h3>
            
            <?php if($msg){ ?>
                <div><?=$msg?></div>
            <?php } ?>

            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <input type="password" name="password" placeholder="your password" class="box" required>
            <input type="submit" value="login" class="btn">
        </form>
        <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
    </div>

</section>

<!-- login section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="image/about-img.svg" alt="">
        </div>

        <div class="content">
            <h3>we take care of your healthy life</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ducimus, quod ex cupiditate ullam in assumenda maiores et culpa odit tempora ipsam qui, quisquam quis facere iste fuga, minus nesciunt.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus vero ipsam laborum porro voluptates voluptatibus a nihil temporibus deserunt vel?</p>
            <!-- <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> -->
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- contact section starts   -->

<section class="contactus" id="contactus">

    <h1 class="heading"> <span>contact</span> us </h1>    

    <div class="row">

        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>

        <form action="">
            <h3>contact us</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="number" placeholder="your number" class="box">
            <input type="email" placeholder="your email" class="box">
            <input type="date" class="box">
            <input type="submit" value="send now" class="btn">
        </form>

    </div>

</section>

<!-- contact section ends -->



<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> login/register </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> contact </a>
        </div>
         
        
        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

    </div>

<!--<div class="credit"> created by <span></span> | all rights reserved </div>-->
<!-- footer section ends -->



<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>