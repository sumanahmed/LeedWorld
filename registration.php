<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:member.php");
}
?>
<?php
include 'inc/header.php';
use App\classes\Member;
?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="signup-form"><!--sign up form-->
                    <?php
                    if(isset($_POST['register'])){
                        $regUsr = Member::registerUser($_POST);
                    }
                    ?>
                    <?php if(isset($regUsr)){ echo $regUsr; } ?>
                    <h2>New User Signup!</h2>
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Name"/>
                        <input type="text" name="mobile_no" placeholder="Mobile Number"/>
                        <input type="text" name="referral_id" placeholder="Referral Id"/>
                        <input type="email" name="email" placeholder="Email Address"/>
                        <input type="text" name="address" placeholder="Address" id="">
                        <input type="text" name="user_id" placeholder="User ID" id="">
                        <input type="password" name="password"  placeholder="Password"/>
                        <button type="submit" name="register" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
                <div class="registration-page">
                    <p>I have already an Account. To Login</p>
                    <a href="login.php" class="btn btn-info btn-lg">Login</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->


<?php include 'inc/footer.php'; ?>