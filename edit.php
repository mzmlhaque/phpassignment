<?php
require_once('inc/header.php');
require_once('logged_session.php');
include('pdo_connection.php');
include('database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_name=$database_name;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
$update_id=htmlentities($_GET['id']);
$sql="SELECT * FROM user WHERE id=$update_id";
$data = $dbcon->query($sql);
$row = $data->fetch(PDO::FETCH_ASSOC);

echo $id;
?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form action="update.php" role="form" method="post">
            <h2>Update info <small>-<?php echo $row['fname'].' '. $row['lname']?></small></h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" value="<?php echo $row['fname']?>" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="last_name" value="<?php echo $row['lname']?>" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="email" value="<?php echo $row['email']?>" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="3" required>
            </div>
            <div class="form-group">
                <input type="text" name="address" value="<?php echo $row['address']?>" id="address" class="form-control input-lg" placeholder="Address" tabindex="4" required>
            </div>
            <div class="form-group">
                <input type="text" name="crimes" value="<?php echo $row['crimes']?>" id="address" class="form-control input-lg" placeholder="Associated Crimes" tabindex="5" required>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" value="<?php echo $row['password']?>" id="password" class="form-control input-lg" placeholder="Password" tabindex="6" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <input class="form-control" type="date" id="datepicker" value="<?php echo $row['dob']?>" name="dob" placeholder="DoB yyyy-mm-dd" required>
                    </div>
                </div>
            </div>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="update" name="update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                <div class="col-xs-12 col-md-6"><a href="index.php" class="btn btn-success btn-block btn-lg">Back</a></div>
            </div>
        </form>
    </div>
</div>

<?php
include_once('inc/footer.php');
?>