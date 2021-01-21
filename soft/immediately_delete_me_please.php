<?php include 'include/header.php';?>
<?php $table_heading = "Notice list";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="notice.php"?>
<?php $where="";?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 

?>

<div class="row">
    <div class ="col-md-6">
        <p>Notice</p>
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style= "display:none;" >
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Title</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="title" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Description</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="desc" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="date" type="date"  />
            </div>
           
        </div>
       
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
               <a  href="notice.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
  </form>
  
  
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->

<?php if(isset($_POST['sub']))
{
  
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $date=$_POST['date'];
   
    
    $sql="INSERT INTO notice SET TITLE='$title',DESCRIPTION='$desc',DATE='$date',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";
    $res=mysqli_query($con,$sql);
    
    if($res)
    {
        $mgs="success";

    }
    else
    {
        $mgs="error";
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

    $NOTICE_NO=$_GET['view'];
	$sql= "SELECT *FROM notice WHERE IS_DELETED=0 AND notice_NO='$NOTICE_NO'";
    $paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "notice_no" value = "<?php echo $NOTICE_NO ; ?>">
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Title</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="title" type="text" value="<?= $paic['TITLE']?>"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Description</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="desc" type="text" value="<?= $paic['DESCRIPTION']?>" />
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
                

             <a  href="notice.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
 
    $notice_no=$_POST['notice_no'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $date=$_POST['date'];
   
         $sql="UPDATE notice SET TITLE='$title',DESCRIPTION='$desc',DATE='$date',UPDATED_BY='$user_no',UPDATED_ON='$CURR_TIME'  WHERE NOTICE_NO='$notice_no' ";
         $res=mysqli_query($con,$sql);
  
         if($res)
             {
                 echo "<p class='nai' style='color:green;font-size:15px;'>Successfully Updated</p>";
                 
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

    $NOTICE_NO=$_GET['delete'];
	$sql= "UPDATE notice SET IS_DELETED= 1 WHERE NOTICE_NO='$NOTICE_NO'";
    $res= mysqli_query($con,$sql);
    if($res)
             {
                 echo "<p style='color:green;font-size:15px;'>Successfully Deleted</p>";
                 
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
        	<td><strong>Date</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM notice WHERE IS_DELETED=0 ";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td><?=$row['TITLE']?></td>
        	<td><?=$row['DATE']?></td>
        	<td>
        	    
        	   <center> 
        	   <a id="view" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?view='.$row['NOTICE_NO']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['NOTICE_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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



$(document).ready(function(){
    
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
            if( $mgs == "success" ) 
            {
                ?>
                    
                    Swal.fire({
                          position: 'top-middle',
                          type: 'success',
                          title: 'Successfully Inserted',
                          showConfirmButton: false,
                          timer: 1500
                        });
                  
                <?php
                $mgs = "" ;
            }
            else if( $mgs == "error"  )
            {
                ?>
                Swal.fire({
                          position: 'top-middle',
                          type: 'error',
                          title: 'Data Insert Failled',
                          showConfirmButton: false,
                          timer: 1500
                        });
              
                <?php
                $mgs="";
                
            }
            
            ?>
    
     
}) ;     





</script>
























