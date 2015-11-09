<?php
error_reporting(0);
include('../pdo_connection.php');
include('../database_config.php');
$db_user =$database_user;
$db_pass =$databse_pass;
$db_name=$database_name;
$dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
$sql="SELECT * FROM user";
$data = $dbcon->query($sql);

    require_once('admin_header.php');

?>
            <div class="row">
                <div class="col-lg-12">
                    <h2></h2>User's Data is here</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>address</th>
                                <th>Date Of Birth</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><img style="width:20%" src="../images/<?php echo $row['picture']?>"></td>
                                <td><?php echo $row['fname']. ' ' . $row['lname']?></td>
                                <td><?php echo $row['address']?></td>
                                <td><?php echo $row['dob']?></td>
                                <td>
                                    <a href="make_admin.php?id=<?php echo $row['id'] ?>"><button class="btn btn-success">Make Admin</button></a>
                                    <a href="update.php?id=<?php echo $row['id']?>"><button class="btn btn-primary">update</button></a>
                                    <a href="delete.php?id=<?php echo $row['id']?>"><button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
