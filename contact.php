<?php include 'inc/header.php'; ?>
<?php
use App\classes\Contact;

$social = Contact::getSocialInfo();
$contact = Contact::getcontactInfo();

if (isset($_POST['submit'])){
    $send = Contact::sendMail($_POST);
}
?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.899993691634!2d90.41190811435852!3d23.750945394673817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b87d335e6d1f%3A0xc714f6adf4206673!2sMalibagh+Bazar+Rd%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1507688610859" width="1100" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="" method="POST">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
                        <?php if($contact){ ?>
	    				<address>
	    					<p>Company : <?php echo $contact['company_name']; ?></p>
                            <p>Address : <?php echo $contact['address']; ?></p>
							<p>Mobile: <?php echo $contact['mobile']; ?></p>
							<p>Email: <?php echo $contact['email']; ?></p>
                            <p>Dhaka, Bangladesh</p>
	    				</address>
                    <?php } ?>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
                            <?php if($social){ ?>
							<ul>
								<li>
									<a target="_blank" href="<?php echo $social['fb']; ?>"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a target="_blank" href="<?php echo $social['tw']; ?>"><i class="fa fa-twitter"></i></a>
								</li>
                                <li>
                                    <a target="_blank" href="<?php echo $social['ln']; ?>"><i class="fa fa-linkedin"></i></a>
                                </li>
								<li>
									<a target="_blank" href="<?php echo $social['gp']; ?>"><i class="fa fa-google-plus"></i></a>
								</li>
							</ul>
                            <?php } ?>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

<?php include 'inc/footer.php'; ?>