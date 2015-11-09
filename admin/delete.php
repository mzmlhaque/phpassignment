    <?php
        require_once('admin_header.php');

    ?>

                <div class="row">
                    <div class="col-lg-12">

                               <?php
                               error_reporting(0);
                               require_once('../logged_session.php');
                               if(!isset($user) && $rank != 'admin'){
                                   echo "<script>alert(\"You are not allowd in this page\")</script>";
                                   echo("<script>location.href='../index.php'</script>");
                               }else
                               {
                                   include('../pdo_connection.php');
                                   include('../database_config.php');
                                   $db_user =$database_user;
                                   $db_pass =$databse_pass;
                                   $db_name=$database_name;
                                   $dbcon=$connection_object->connection('localhost',$db_user,$db_pass,$db_name);
                                   $delete_id=$_GET['id'];

                                   //echo $name.$age.$address.$designation.$salary.$email.$password;
                                   $sql="SELECT * FROM user WHERE id=$delete_id;";
                                   $data = $dbcon->query($sql);
                                   $row = $data->fetch(PDO::FETCH_ASSOC);
                                   $name = $row['fname']. ' '. $row['lname'];
                                   echo("<script>alert('Sure to Delete $name')</script>");
                                   if($row['rank'] && $row['id']==$id){
                                       echo("<script>alert('You are not allowed to delete $name')</script>");
                                       echo("<script>location.href='index.php'</script>");
                                   }else{
                                       $sql="DELETE FROM user WHERE id=$delete_id;";
                                       $preparestatement=$dbcon->prepare($sql);
                                       $preparestatement->execute();
                                       echo("<script>alert(' $name has been Deleted')</script>");
                                       echo("<script>location.href='index.php'</script>");
                                   }

                               }
                               ?>
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
