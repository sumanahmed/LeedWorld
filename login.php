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

<?php
if(isset($_POST['login'])){
    $login = Member::userLoginCheck($_POST);
}
?>
<section id="form" style="min-height: 400px;"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="login-form"><!--login form-->
                    <h2>Sign Up Free</h2>
                    <form action="" method="POST">
                        <?php if(isset($login)){ echo $login; } ?>
                        <input type="text" name="user_id" placeholder="Enter User ID" />
                        <input type="password" name="password" placeholder="Enter Password" />
                        <button type="submit" name="login" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
                <div class="registration-page">
                    <p>If you have no Account. To Create Account</p>
                    <a href="registration.php" class="btn btn-info btn-lg">REGISTRATION</a>
                </div>

            </div>


        </div>
    </div>
</section><!--/form-->


<?php include 'inc/footer.php'; ?>