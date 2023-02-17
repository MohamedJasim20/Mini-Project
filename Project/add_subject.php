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
                    <h3 class="text-primary">Subject Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Subject Management</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/save_subjects.php" name="userform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="class_id" class="form-control"   placeholder="Class" required="">
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
                                                <label class="col-sm-3 control-label">Subject Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="subjectname" class="form-control" placeholder="Subject Name" id="event" ; required="">
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
				
				<div class="card">
                        <div class="card-body">
				<div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>Class Name</th>
                                                <th>Subject Name</th>                                               
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    
                                  $sql1 = "select s.id, c.classname,  s.subjectname from tbl_subject S, tbl_class C where s.class_id = c.id order by s.class_id, c.id";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) { 
                                
                                 
                                      ?>
                                            <tr>
											<td><?php echo $row['classname']; ?></td>
                                                <td><?php echo $row['subjectname']; ?></td>
                                                
                                                <td>
            <?php if(isset($useroles)){  if(in_array("edit_subject",$useroles)){ ?> 
                                                <a href="edit_subject.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-plus-square"></i></button></a>
                                              <?php } } ?>

            <?php if(isset($useroles)){  if(in_array("delete_subject",$useroles)){ ?> 
                                                <a href="view_subject.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                              <?php } } ?>
                                               
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
				</div>
                        </div>
				 <div class="page-wrapper">
           
           
           
            <div class="container-fluid">
                
                 
                              
                                
                            
               
               
<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
                
        
<?php include('footer.php');?>
