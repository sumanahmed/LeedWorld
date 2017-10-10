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


	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="" method="POST">
                            <?php if(isset($login)){ echo $login; } ?>
                            <input type="email" name="email" placeholder="Email Address" />
                            <input type="password" name="password" placeholder="Password" />
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <button type="submit" name="login" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
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
							<input type="email" name="email" placeholder="Email Address"/>
                            <input type="text" name="address" placeholder="Address" id="">
							<input type="text" name="city" placeholder="City"/>
							<input type="number" name="zip"  placeholder="zip code"/>
							<input type="password" name="password"  placeholder="Password"/>
							<button type="submit" name="register" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


<?php include 'inc/footer.php'; ?>