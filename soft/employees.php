<?php include 'include/header.php';?>
<?php $table_heading = "EMPLOYEES list";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="employees.php"?>
<?php $where=""; $mgs = ""?>


<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 

?>

<div class="row">
    <div class ="col-md-6">
        <p>Employees</p>
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style='display:none;' >
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Employees Name</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="employeesName" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">User Name</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="userName" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Email</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="email" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Phone Number</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="phone" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date of Birth</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="dob" type="date" >
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Gender</label>
            <div class="col-lg-8">
                    <select name="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
               
                    </select>   
            </div>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Use Role</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="user_role" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT ROLE_NO , TITLE FROM user_role" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['ROLE_NO']."'>".$value['TITLE']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Departments</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="department" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT DEPARTMENT_NO , TITLE FROM department" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['DEPARTMENT_NO']."'>".$value['TITLE']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date of Joining</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="join" type="date" >
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Joining Salary</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="salary" type="text"  />
            </div>
           
        </div>
        

         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Address</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="address" type="address" >
            </div>
           
        </div>
        
        <div class="form-group "> 
            <label for="projectImage" class="control-label col-lg-2">Employees Image</label>
            <div class="col-lg-8">
                <input   id="projectImage" name="employeesImage" type="file" />
            </div>
            
        </div>
        
        
        
        
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Password</label>
            <div class="col-lg-8">
                <input class=" form-control" id="pass" name="password" type="password"  />
            </div>
           
        </div>
  
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Confirm Password</label>
            
            <div class="col-lg-8">
                 <span id="message" ></span>
                <input class=" form-control" id="r_pass" name="r_pass" type="password"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Status</label>
            
            <div class="col-lg-8">
                 <input type="radio" name="status" value="1" checked> Active<br>
                 <input type="radio" name="status" value="0">Disabled<br>
             
            </div>
           
        </div>
        
        
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
               <a  href="employees.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
  </form>
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->



<?php if(isset($_POST['sub']))
{
  
    $employeesName=$_POST['employeesName'];
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $employeesImage=$_FILES['employeesImage']['name'];
    $user_role=$_POST['user_role'];
    $department=$_POST['department'];
    $join=$_POST['join'];
    $salary=$_POST['salary'];
    $status=$_POST['status'];
    $password=$_POST['password'];
    
    if($_FILES['employeesImage']['error']>0)
    {
       $employeesImage = "No Image Uploaded";
        
    }
    else
    {
        move_uploaded_file($_FILES['employeesImage']['tmp_name'],"upload/". $employeesImage);
        
    }
    
    $sql="INSERT INTO employees SET EMPLOYEE_NAME='$employeesName',JOINING_DATE='$join',JOINING_SALARY='$salary',EMPLOYEE_PROFILE_PIC='$employeesImage',EMPLOYEE_GENDER='$gender',EMPLOYEE_DOB='$dob',
    EMAIL='$email',USERNAME='$userName',PASSWORD='$password',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME',PHONE='$phone',ADDRESS='$address',
    DEPARTMENT_NO='$department',ROLE_NO='$user_role',STATUS='$status'";
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

  
    
    $emp_no=$_GET['views'];

	$sql= "SELECT `EMPLOYEE_NO`, `EMPLOYEE_ID`, `EMPLOYEE_NAME`, `EMPLOYEE_PROFILE_PIC`, `EMPLOYEE_GENDER`, `EMPLOYEE_DOB`, employees.`ROLE_NO`, employees.`DEPARTMENT_NO`,
	`DESIGNATION_NO`, `JOINING_DATE`, `JOINING_SALARY`, `EMAIL`, `USERNAME`, `PASSWORD`, `PHONE`, `ADDRESS`, `STATUS`, user_role.ROLE_NO, user_role.TITLE as
	user_role_tittle, department.DEPARTMENT_NO, department.TITLE as department_tittle FROM employees LEFT JOIN user_role ON employees.ROLE_NO=user_role.ROLE_NO LEFT JOIN 
	department ON employees.DEPARTMENT_NO=department.DEPARTMENT_NO WHERE employees.IS_DELETED=0 AND EMPLOYEE_NO = '$emp_no'";
	$paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
      
      <div class="container">

        <div class="form-group "> 
            <label for="projectImage" class="control-label col-lg">Employee Image</label>
            <div class="col-lg">
                <img src="upload/<?=$paic['EMPLOYEE_PROFILE_PIC']?>" onerror="this.src='upload/freelancer.jpg'" altr="no image" style= "height:50px; width:50px;"/>
               
            </div>
            
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Employee Name : <?= $paic['EMPLOYEE_NAME']?></label>
           
           
        </div>
        
      
        

        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">User Name : <?= $paic['USERNAME']?></label>
            
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Email : <?= $paic['EMAIL']?> </label>
            
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Phone Number : <?= $paic['PHONE']?></label>
           
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Date of Birth : <?= $paic['EMPLOYEE_DOB']?></label>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Gender : <?= $paic['EMPLOYEE_GENDER']?></label>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Use Role : <?= $paic['user_role_tittle']?></label>
              
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Departments : <?= $paic['department_tittle']?></label>
               
           
        </div>
       
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Date of Joining : <?= $paic['JOINING_DATE']?></label>
           
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Joining Salary</label>
   
        </div>
        
        
        
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Address : <?= $paic['ADDRESS']?></label>
            
           
        </div>
        
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Status : <?php if( $paic['STATUS'] == '1' ){ echo "Active";} else {echo "Disabled"; }?></label>
            
           
           
        </div>
       
        <div class="form-group">
           
           <a  href="employees.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
    </div>
  </form>
 
 <?php } ?>                       
                              
<?php if(isset($_GET['edit']))
{
?>

<?php

    $emp_no=$_GET['edit'];
   
	$sql= "SELECT `EMPLOYEE_NO`, `EMPLOYEE_ID`, `EMPLOYEE_NAME`, `EMPLOYEE_PROFILE_PIC`, `EMPLOYEE_GENDER`, `EMPLOYEE_DOB`, employees.`ROLE_NO`, employees.`DEPARTMENT_NO`,
	`DESIGNATION_NO`, `JOINING_DATE`, `JOINING_SALARY`, `EMAIL`, `USERNAME`, `PASSWORD`, `PHONE`, `ADDRESS`, `STATUS`, user_role.ROLE_NO, user_role.TITLE as
	user_role_tittle, department.DEPARTMENT_NO, department.TITLE as department_tittle FROM employees LEFT JOIN user_role ON employees.ROLE_NO=user_role.ROLE_NO LEFT JOIN 
	department ON employees.DEPARTMENT_NO=department.DEPARTMENT_NO WHERE employees.IS_DELETED=0 AND EMPLOYEE_NO = '$emp_no'";
	$paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "member_no" value = "<?php echo $emp_no ; ?>">
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Employee Name</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="employeesName" type="text" value="<?= $paic['EMPLOYEE_NAME']?>"  />
            </div>
           
        </div>
    

        <div class="form-group "> 
            <label for="projectImage" class="control-label col-lg-2">Employee Image</label>
            <div class="col-lg-8">
                <img src="upload/<?=$paic['EMPLOYEE_PROFILE_PIC']?>" onerror="this.src='upload/freelancer.jpg'" altr="no image" style= "height:50px; width:50px;"/>
                <input   id="projectImage" name="employeesImage" type="file" />
            </div>
            
        </div>

        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">User Name</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="userName" type="text" value="<?= $paic['USERNAME']?>" />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Email</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="email" type="email" value="<?= $paic['EMAIL']?>" />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Phone Number</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="phone" type="text" value="<?= $paic['PHONE']?>" />
            </div>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date of Birth</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="dob" type="date" value="<?= $paic['EMPLOYEE_DOB']?>"  >
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Gender</label>
            <div class="col-lg-8">
                    <select name="gender">
                      <option value = "<?= $paic['EMPLOYEE_GENDER']?>" ><?= $paic['EMPLOYEE_GENDER']?></option>
                      <option value="Male" >Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
               
                    </select>   
            </div>
           
        </div>
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Use Role</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="user_role" id = "select" >
                       <option value="<?= $paic['ROLE_NO']?>"><?= $paic['user_role_tittle']?></option>
                              <?php
                                    $query = "SELECT ROLE_NO , TITLE FROM user_role" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['ROLE_NO']."'>".$value['TITLE']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Departments</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="department" id = "select" >
                       <option value="<?= $paic['DEPARTMENT_NO']?>"><?= $paic['department_tittle']?></option>
                              <?php
                                    $query = "SELECT DEPARTMENT_NO , TITLE FROM department" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['DEPARTMENT_NO']."'>".$value['TITLE']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
       
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date of Joining</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="join" type="date" value="<?= $paic['JOINING_DATE']?>" >
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Joining Salary</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="salary" type="text" value="<?= $paic['JOINING_SALARY']?>" />
            </div>
           
        </div>
        
        
        
         <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Address</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="address" type="text" value="<?= $paic['ADDRESS']?>" >
            </div>
           
        </div>
        
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Status</label>
            
            <div class="col-lg-8">
                 <input type="radio" name="status" value="1" <?php if( $paic['STATUS'] == '1' ){ echo "checked";}?>> Active<br>
                 <input type="radio" name="status" value="0" <?php if( $paic['STATUS'] == '0' ){ echo "checked";}?>>Disabled<br>
             
            </div>
           
        </div>
        
                
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmt" class="btn btn-primary" name="update" value="Update" />

             <a  href="employees.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
 
    $member_no=$_POST['member_no'];
  
    $employeesName=$_POST['employeesName'];
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $employeesImage=$_FILES['employeesImage']['name'];
    
    $user_role=$_POST['user_role'];
    $department=$_POST['department'];
    $join=$_POST['join'];
    $salary=$_POST['salary'];
    $status=$_POST['status'];
    
    if($_FILES["employeesImage"]["name"] == "")
    {
    $sql="UPDATE employees SET EMPLOYEE_NAME='$employeesName',JOINING_DATE='$join',JOINING_SALARY='$salary',
    EMPLOYEE_GENDER='$gender',EMPLOYEE_DOB='$dob',
    EMAIL='$email',USERNAME='$userName',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME',PHONE='$phone',ADDRESS='$address',
    DEPARTMENT_NO='$department',ROLE_NO='$user_role',STATUS='$status' WHERE EMPLOYEE_NO='$member_no'";
         
    }
    else
    {
        
    $sql="UPDATE employees SET EMPLOYEE_NAME='$employeesName',JOINING_DATE='$join',JOINING_SALARY='$salary',
    EMPLOYEE_GENDER='$gender',EMPLOYEE_DOB='$dob',
    EMAIL='$email',USERNAME='$userName',CREATED_BY='$user_no',EMPLOYEE_PROFILE_PIC='$employeesImage',CREATED_ON='$CURR_TIME',PHONE='$phone',ADDRESS='$address',
    DEPARTMENT_NO='$department',ROLE_NO='$user_role',STATUS='$status'WHERE EMPLOYEE_NO='$member_no'";
     
    move_uploaded_file($_FILES["employeesImage"]["tmp_name"],"upload" .$employeesImage );
        
    }
   
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

    $emp_no=$_GET['delete'];
	$sql= "UPDATE employees SET IS_DELETED= 1 WHERE EMPLOYEE_NO='$emp_no'";
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
        	<td><strong>User Role</strong></td>
        	<td><strong>Status</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM employees LEFT JOIN user_role ON employees.ROLE_NO=user_role.ROLE_NO  WHERE employees.IS_DELETED='0'";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td><?=$row['EMPLOYEE_NAME']?></td>
        	<td><?=$row['TITLE']?></td>
        	<td><?php 
        	if($row['STATUS']==1){
        	echo"Active";
        	}
        	else
        	{
        	    	echo"Disabled";
        	}
        	?></td>
        	
        	<td>
        	    
        	   <center> 
        	   <a id="views"  href="<?=$targetpage.'?views='.$row['EMPLOYEE_NO']?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
        	   <a id="edit" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?edit='.$row['EMPLOYEE_NO']?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['EMPLOYEE_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    window.location.href="/advocate/soft/employees.php";
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
