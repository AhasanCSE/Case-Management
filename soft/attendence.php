<?php include 'include/header.php';?>
<?php $table_heading = "Attendence list";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="attendence.php"?>
<?php $where=""; $mgs = ""?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 

?>

<div class="row">
    <div class ="col-md-6">
        <p>Attendence</p>
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style= "display:none;" >
         
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="date" type="date"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">IN Time</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="intime" type="time"  />
            </div>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Out Time</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="outtime" type="time"  />
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Employee</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="emp" id = "select" >
                       <option value="">Select One</option>
                       <?php
                       $sql="SELECT EMPLOYEE_NO , EMPLOYEE_NAME FROM employees";
                       $res=mysqli_query($con,$sql);
                   foreach($res as $value){
                       echo "<option value='".$value['EMPLOYEE_NO']."'>".$value['EMPLOYEE_NAME']."</option>";
                     
      
                   }
                       ?>
                       
                    </select>
                </div>
           
        </div>
       
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
               <a  href="attendence.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
  </form>
  
  
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->

<?php if(isset($_POST['sub']))
{
  
    $date=$_POST['date'];
    $intime=$_POST['intime'];
    $outtime=$_POST['outtime'];
    $emp=$_POST['emp'];
   
    
    $sql="INSERT INTO attendence SET DATE='$date',IN_TIME='$intime',OUT_TIME='$outtime',EMPLOYEE_NO='$emp',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";
    $res=mysqli_query($con,$sql);
    
                   if($res)
                    {
                        $mgs="insert";
                         //echo "<meta http-equiv='refresh' content='0; url=departments.php' />";
                
                    }
                    else
                    {
                        $mgs="fail";
                        
                    }
                    
  
}  

?>

                                <!--view_form  view form view -->
                                <!--view_form  view form view -->
                                <!--view_form  view form view -->
                                <!--view_form  view form view -->
                              <!--view_form  view form view -->
<?php if(isset($_GET['view']))
{
?>

<?php

    $ATTENDENCE_NO=$_GET['view'];
	$sql= "SELECT attendence.*, employees.EMPLOYEE_NAME FROM attendence left join employees on attendence.EMPLOYEE_NO=employees.EMPLOYEE_NO where ATTENDENCE_NO='$ATTENDENCE_NO'";
    $paic=mysqli_fetch_assoc(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "attendence_no" value = "<?php echo $ATTENDENCE_NO ; ?>">
          
          <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Employee Name</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="emp" id = "select" >
                       <option value="<?= $paic['EMPLOYEE_NO']?>"><?= $paic['EMPLOYEE_NAME']?></option>
                              <?php
                                    $query = "SELECT EMPLOYEE_NO , EMPLOYEE_NAME FROM employees" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['EMPLOYEE_NO']."'>".$value['EMPLOYEE_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
      
       
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">IN Time</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="intime" type="time" value="<?= $paic['IN_TIME']?>" />
            </div>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">OUT Time</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="outtime" type="time" value="<?= $paic['OUT_TIME']?>" />
            </div>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="date" type="date" value="<?= $paic['DATE']?>" />
            </div>
           
        </div>
       
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmt" class="btn btn-primary" name="update" value="Update" />
                

             <a  href="attendence.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
  </form>
 
 <?php
  }
  ?>

                                                             <!--update update update-->
                                                             <!-- update update update-->
                                                             <!--  update update update-->
                                                             <!--   update update update-->
                                                             
 <?php if(isset($_POST['update']))
 {
 ?>
 
 <?php
 
    $attendence_no=$_POST['attendence_no'];
    $emp=$_POST['emp'];
    $intime=$_POST['intime'];
    $outtime=$_POST['outtime'];
    $date=$_POST['date'];
   
        $sql="UPDATE attendence SET DATE='$date',IN_TIME='$intime',OUT_TIME='$outtime',EMPLOYEE_NO='$emp',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME' WHERE ATTENDENCE_NO='$attendence_no'";

       
        $res=mysqli_query($con,$sql);
                  if($res)
                    {
                        $mgs="update";
                         //echo "<meta http-equiv='refresh' content='0; url=departments.php' />";
                
                    }
                    else
                    {
                        $mgs="fail";
                        
                    }

 ?>
 
 <?php
 }
 ?>
 
                                                                  <!--Delete Delete Delete-->
                                                                  <!--Delete Delete Delete-->
                                                                  <!--Delete Delete Delete-->
                                                                  <!--Delete Delete Delete-->
 <?php if(isset($_GET['delete']))
{
?>

<?php

    $ATTENDENCE_NO=$_GET['delete'];
	$sql= "UPDATE attendence SET IS_DELETED= 1 WHERE ATTENDENCE_NO='$ATTENDENCE_NO'";
    $res= mysqli_query($con,$sql);
    if($res)
    {
        $mgs="delete";
         //echo "<meta http-equiv='refresh' content='0; url=departments.php' />";

    }
    else
    {
        $mgs="fail";
        
    }
    
 ?>  
 
<?php
}
?>

                                                                  <!--saerch form-->
                                                                  <!--search form-->
                                                                  <!--search form-->


<form class='cmxform form-horizontal' id="hide_search" method="post" action="">
    <div class="vali-form">
      
    <div class="row">
        <div class="col-md-3 form-group1">
          <label class="control-label">Records Per Page</label>
          <select class="form-control field_data" name="limit" id="groupId">
                <option value="2">2</option>
                <option value="2">4</option>
                <option value="6">6</option>
                <option value="100000">All</option>
               
            </select>
       </div>
       <div class="col-md-1" >
            <button type="submit" class="btn btn-primary" name="go" id="" style="margin-top: 27px; margin-left: 16px;">GO</button>
             
       </div>
       <div class ="col-md-4">
       </div>
       <div class="col-md-3 "  >
          <label class="control-label">Keywords</label>
             <input type="text" placeholder="Search....." class="form-control field_data"  id="myInput"  >
            
       </div>
       
       

    </div>
    </div>
    
</form>
                             <!--search calculate-->
                             <!--search calculate-->
                             <!--search calculate-->
                             <!--search calculate-->
                             
 <?php
 if(isset($_POST['go'])){
 $limit= $_POST['limit'];
//  echo $limit;
 $where="LIMIT $limit";
 }
 ?>
                             


<table id="table_hide" class="table table-bordered" style ="margin-top:50px;">
        <thead>	
    	<tr>
        	<td><strong>Sr No</strong></td>
        	<td><strong>Employee NO</strong></td>
        	<td><strong>IN Time</strong></td>
        	<td><strong>OUT Time</strong></td>
        	<td><strong>Date</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM attendence WHERE IS_DELETED=0 ";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td><?=$row['EMPLOYEE_NO']?></td>
        	<td><?=$row['IN_TIME']?></td>
        	<td><?=$row['OUT_TIME']?></td>
        	<td><?=$row['DATE']?></td>
        	<td>
        	    
        	   <center> 
        	   <a id="view" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?view='.$row['ATTENDENCE_NO']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['ATTENDENCE_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
               </center>
        	    
        	</td>
        </tr>
    
    <?php endwhile;?>
         </tbody>
    </table>



 <?php include 'include/footer.php';?>
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>
function show( msg )
{
    
        Swal.fire({
                          position: 'top-middle',
                          type: 'success',
                          title: msg,
                          showConfirmButton: false,
                          timer: 1500
            });
    
   
    
}
function reLocate()
{
    window.location.href="/advocate/soft/attendence.php";
}
    

$(document).ready(function(){
    if($("#view_form").is(":visible"))
        {
                $("#signupForm").hide();
                $("#add_new").hide();
                 $("#hide_search").hide();
                $("#table_hide").hide();
        }
    
    $("#add_new").on("click",function(){
        
        $("#signupForm").show();
        $("#add_new").hide();
         $("#hide_search").hide();
        $("#table_hide").hide();
         $("#view_form").hide();
      
 
    }) ;
    
     $("#btnSubmit").on("click",function( ){
 
      $('#signupForm').hide(); 
      $("#add_new").show();
      
    
     }) ;
     
  
     
    
     
    
    
    
    <?php 
            if( $mgs == "insert" ) 
            {
                ?>
                    
                    show( "Successfylly Added!") ;
                    setTimeout( reLocate, 1500);
                <?php
                //$mgs = "" ;
            }
            
           else if( $mgs == "update" ) 
            {
                ?>
                    show( "Successfylly updated!") ;
                    setTimeout( reLocate, 1500);
   
                <?php
                
                //$mgs = "" ;
            }
            else if( $mgs == "delete" ) 
            {
                ?>
                    
                    show( "Successfylly deleted!") ;
                    setTimeout( reLocate, 1500);
                  
                <?php
                //$mgs = "" ;
            }
            
            else if($mgs== "fail")
            {
                ?>
                Swal.fire({
                          position: 'top-middle',
                          type: 'error',
                          title: 'Operation Failled',
                          showConfirmButton: false,
                          timer: 1500
                        });
                 setTimeout( reLocate, 1500);
              
                <?php
                //$mgs="";
                
            }
            
            ?>
    
     
}) ;     





</script>
























