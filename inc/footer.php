<?php
use App\classes\Contact;
$getCopyright = Contact::getCopyRightText();
?>
<footer id="footer"><!--Footer-->


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left"><?php echo $getCopyright['copyright_text']; ?> </p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/Drift.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>