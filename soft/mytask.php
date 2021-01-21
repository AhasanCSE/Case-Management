<?php include 'include/header.php';?>
<?php $table_heading = "My Tasks";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="mytask.php"?>
<?php $where="";?>
<?php 
    $user_no =$_SESSION['user']['USER_NO'];
   
    $CURR_TIME = date('Y-m-d : H:i:s'); 

?>

<div class="row">
    <div class ="col-md-6">
        <!--<p>task	</p>-->
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i> Add New </button>
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style='display:none;' >
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Name : </label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="name" type="text"  />
            </div>
           
        </div> 
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Priority :</label>
            <div class="col-lg-8">
                <select class="form-control mr-sm-2" name="priority" id = "select_type" >
                    <option value = "" >Select One</option>
                    <option value = "High" >High</option>
                     <option value = "Medium" >Medium</option>
                     <option value = "Low" >Low</option>
                     </select>
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Due Date : </label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="date" type="date"/>
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case : </label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="case" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT ALL_CASES_CASE_NO , ALL_CASES_TITLE FROM all_cases" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['ALL_CASES_CASE_NO']."'>".$value['ALL_CASES_TITLE']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
       
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Assigned To : </label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="assign" id = "select" >
                       <option value = "" >Select One</option>
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
            <label for="bn_title" class="control-label col-lg-2">Description : </label>
            <div class="col-lg-8">
                <textarea class=" form-control" id="" name="desc"> </textarea>
            </div>
           
        </div>
        
    <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
               <a  href="mytask.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
    </div>
  </form>
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-f$caseile submit-file-->

<?php if(isset($_POST['sub']))
{
  
    $name=$_POST['name'];
    $priority=$_POST['priority'];
    $date=$_POST['date'];
    $case=$_POST['case'];
    $assign=$_POST['assign'];
    $desc=$_POST['desc'];
  
  
    
    $sql="INSERT INTO task SET TASK_NAME='$name',TASK_PRIORITY='$priority',TASK_CASE='$case',TASK_DUE_DATE='$date',TASK_ASSIGNED='$assign',TASK_DESCRIPTION='$desc',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";

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
<?php if(isset($_GET['views']))
{
?>

<?php

    $TASK_NO=$_GET['views'];
	$sql= "SELECT `TASK_NO`,`TASK_NAME`,`TASK_PRIORITY`,`TASK_DUE_DATE`,`TASK_CASE`,`TASK_ASSIGNED`,`TASK_DESCRIPTION`, EMPLOYEE_NAME,EMPLOYEE_NO,
	all_cases.ALL_CASES_TITLE ,all_cases.ALL_CASES_CASE_NO FROM `task` LEFT JOIN employees ON employees.EMPLOYEE_NO=task.TASK_NO LEFT JOIN all_cases ON
	all_cases.ALL_CASES_CASE_NO=task.TASK_CASE WHERE task.IS_DELETED=0 AND TASK_NO='$TASK_NO'";
	

    $paic=mysqli_fetch_array(mysqli_query($con,$sql));
    //print_r ($paic);

    
 ?>
                                
<form class="cmxform form-horizontal " id="view" >
        
       <div class="container"> 
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Name : <?= $paic['TASK_NAME']?> </label>
  
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Priority : <?=$paic['TASK_PRIORITY']?> </label>
   
        </div>

        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Due Date : <?= $paic['TASK_DUE_DATE']?></label>
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Case : <?= $paic['ALL_CASES_TITLE']?> </label>
  
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Assigned To : <?=$paic['EMPLOYEE_NAME']?> </label>
   
        </div>

        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Description : <?= $paic['TASK_DESCRIPTION']?></label>
        </div>
        <div class="form-group">
           <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
             <a  href="mytask.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
           </div>
        </div>
        </div> 
     
    </form>
    <?php
}
?>


<?php if(isset($_GET['edit']))
{
?>

<?php
      
  
    $TASK_NO=$_GET['edit'];
	$sql= "SELECT `TASK_NO`,`TASK_NAME`,`TASK_PRIORITY`,`TASK_DUE_DATE`,`TASK_CASE`,`TASK_ASSIGNED`,`TASK_DESCRIPTION`, EMPLOYEE_NAME,EMPLOYEE_NO,
	all_cases.ALL_CASES_TITLE ,all_cases.ALL_CASES_CASE_NO FROM `task` LEFT JOIN employees ON employees.EMPLOYEE_NO=task.TASK_NO LEFT JOIN all_cases ON
	all_cases.ALL_CASES_CASE_NO=task.TASK_CASE WHERE task.IS_DELETED=0 AND TASK_NO='$TASK_NO'";
    $paic=mysqli_fetch_array(mysqli_query($con,$sql));
	

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "TASK_NO" value ="<?php echo $TASK_NO ;?>">
         
         
         
         
        
       <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Name : </label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="name" type="text" value = "<?= $paic['TASK_NAME']?>"  />
            </div>
           
        </div> 
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Priority :</label>
            <div class="col-lg-8">
                <select class="form-control mr-sm-2" name="priority" id = "select_type" >
                    <option value = "<?= $paic['TASK_PRIORITY']?>" ><?= $paic['TASK_PRIORITY']?></option>
                    <option value = "High" >High</option>
                     <option value = "Medium" >Medium</option>
                     <option value = "Low" >Low</option>
                     </select>
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Due Date : </label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="date" type="date"  value = "<?= $paic['TASK_DUE_DATE']?>" />
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case : </label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="case" id = "select" >
                       <option value = "<?= $paic['ALL_CASES_CASE_NO']?>" ><?= $paic['ALL_CASES_TITLE']?></option>
                              <?php
                                    $query = "SELECT ALL_CASES_CASE_NO , ALL_CASES_TITLE FROM all_cases" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['ALL_CASES_CASE_NO']."'>".$value['ALL_CASES_TITLE']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
       
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Assigned To : </label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="assign" id = "select" >
                       <option value = "<?= $paic['EMPLOYEE_NO']?>" ><?= $paic['EMPLOYEE_NAME']?></option>
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
            <label for="bn_title" class="control-label col-lg-2">Description : </label>
            <div class="col-lg-8">
                <textarea class=" form-control" id="" name="desc"> <?= $paic['TASK_DESCRIPTION']?></textarea>
            </div>
           
        </div>
         
        
         <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmt" class="btn btn-primary" name="update" value="Update" />
                
             <a  href="mytask.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
    $TASK_NO=$_POST['TASK_NO'];
    $name=$_POST['name'];
    $priority=$_POST['priority'];
    $date=$_POST['date'];
    $case=$_POST['case'];
    $assign=$_POST['assign'];
    $desc=$_POST['desc'];

    
   
       $sql="UPDATE task SET TASK_NAME='$name',TASK_PRIORITY='$priority',TASK_CASE='$case',TASK_DUE_DATE='$date',TASK_ASSIGNED='$assign',
       TASK_DESCRIPTION='$desc',UPDATED_BY='$user_no',UPDATED_ON='$CURR_TIME' WHERE TASK_NO='$TASK_NO'";
         
  
   
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

    $TASK_NO=$_GET['delete'];
	$sql= "UPDATE task SET IS_DELETED= 1 WHERE TASK_NO='$TASK_NO'";
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
        	<td><strong>Name</strong></td>
        	<td><strong>Priority</strong></td>
        	<td><strong>Due Date</strong></td>
        	<td><strong>Created By</td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM task WHERE IS_DELETED=0 ";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td><?=$row['TASK_NAME']?></td>
        	<td><small class="label pull-center btn-danger"><?=$row['TASK_PRIORITY']?></small></td>
        	<td><?=$row['TASK_DUE_DATE']?></td>
        	<td><?php echo $_SESSION['user']['FULL_NAME']; ?></td>
        	
        
        
        	<td>
        	    
        	   <center> 
        	    <a id="views"  href="<?=$targetpage.'?views='.$row['TASK_NO']?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
        	   <a id="edit" onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['TASK_NO']?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['TASK_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    window.location.href="/advocate/soft/mytask.php";
}


$(document).ready(function(){
    
        if($("#view_form").is(":visible"))
        {
                $("#signupForm").hide();
                $("#add_new").hide();
                 $("#hide_search").hide();
                $("#table_hide").hide();
        }
        if($("#view").is(":visible"))
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
     
      $("#pass,#r_pass").on("keyup",function(){
         if($("#pass").val()==$("#r_pass").val())
         {
             $("#message").html("Matching").css("color","green");
         }
         else
         {
             $("#message").html("Not Matching").css("color","red");
         }
         
     });
     
    
     
    
    
    
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

























