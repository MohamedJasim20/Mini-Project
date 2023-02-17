
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

?>

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">TIME TABLE</h3> </div
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/save_student.php" name="studentform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS NAME</label>
                                                <div class="col-sm-9">
												  <select type="text" name="classname" class="form-control"   placeholder="Class" required="">
                                                        <option value="">--Select Class--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_class`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
                                                                        <?php echo $row['classname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                    </select>
												  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">SUBJECT NAME</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="sfname" class="form-control" placeholder="SUBJECT NAME" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">DATE</label>
                                                <div class="col-sm-9">
                                                    <input type="date"  name="slname" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="DATE" required="">
                                                </div>
                                            </div>
                                        </div>

                                       
                               

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">TIME</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="semail" class="form-control"  placeholder="time" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

<?php include('footer.php');?>
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT Matching';
  }
}
</script>