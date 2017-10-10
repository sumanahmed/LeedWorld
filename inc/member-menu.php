<div class="col-sm-3 col-md-3">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="user.php"><span class="glyphicon glyphicon-dashboard">
                            </span> Dashboard</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="my-team.php"><span class="glyphicon glyphicon-align-justify">
                            </span> My Team</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span> Transfer</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="cash-out.php">Cash Out</a> <span class="label label-success">$ 320</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="balance-transfer.php">Balance Transfer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="point-transfer.php">Point Transfer</a>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="product-delivery.php"><span class="glyphicon glyphicon-align-justify">
                            </span> Product Delivery</a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span> History</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-usd"></span><a href="income-history.php"> Income History</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-usd"></span><a href="withdraw-history.php"> Withdraw History</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-barcode"></span><a href="point-transfer-history.php"> Point Transfer History</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-file"></span><a href="product-delivery-history.php"> Product Delivery History</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span> Account</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="message.php"> Message </a> <span class="label label-info">5</span>
                            </td>
                        </tr>
                        <tr>
                            <td> <?php $id = $_SESSION['id']; ?>
                                <a href="profile.php?id=<?php echo $id; ?>"> Profile Details</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="change-password.php">Change Password</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>