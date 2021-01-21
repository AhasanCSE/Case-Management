<?php include 'include/header.php';?>
<?php $table_heading = "Act";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="act.php"?>
<?php $where="";$mgs="";?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 


?>

<div class="row">
    <div class ="col-md-6">
        <!--<p>User Role</p>-->
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
    </div>
    
</div>

<?php if(isset($_POST['sub']))
{
   
    $ACT_NAME=$_POST['ACT_NAME'];
    $ACT_DESCRIPTION=$_POST['ACT_DESCRIPTION'];
   
  
    $sql="INSERT INTO act SET ACT_NAME='$ACT_NAME',ACT_DESCRIPTION='$ACT_DESCRIPTION',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";
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
<?php if(isset($_GET['edit']))
{
?>

<?php

    $ACT_NO=$_GET['edit'];
	$sql= "SELECT *FROM act WHERE IS_DELETED=0 AND ACT_NO='$ACT_NO'";
    $paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "ACT_NO" value = "<?php echo $ACT_NO ; ?>">
         
        <div class="form-group ">
            <label for="bn_ACT_NAME" class="control-label col-lg-2">NAME</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="ACT_NAME" type="text" value="<?= $paic['ACT_NAME']?>"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_ACT_NAME" class="control-label col-lg-2">DESCRIPTION</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="desc" type="text" value="<?= $paic['ACT_DESCRIPTION']?>" />
            </div>
           
        </div>
        
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="update" value="Update" />
                

             <a  href="act.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
 
   $id=$_POST['ACT_NO'];
  
    $ACT_NAME=$_POST['ACT_NAME'];
    $desc=$_POST['desc'];
    
         $sql="UPDATE act SET ACT_NAME='$ACT_NAME',ACT_DESCRIPTION='$desc',UPDATED_BY='$user_no',UPDATED_ON='$CURR_TIME' WHERE ACT_NO='$id'";

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

    $id=$_GET['delete'];
     $sql="UPDATE act SET IS_DELETED=1 WHERE ACT_NO='$id'";
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
  
  


                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style='display:none;' >
         
        <div class="form-group ">
            <label for="bn_ACT_NAME" class="control-label col-lg-2">Name</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="ACT_NAME" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_ACT_NAME" class="control-label col-lg-2">DESCRIPTION</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="ACT_DESCRIPTION" type="text"  />
            </div>
           
        </div>
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
                <a  href="act.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
  </form>
  
  
  
  
  
  
                                                                 <!--saerch form-->
                                                                  <!--search form-->
                                                                  <!--search form-->

  <form class='cmxform form-horizontal' id="hide_search" method="post" action="">
    <div class="vali-form">
      
    <div class="row">
        <div class="col-md-3 form-group1">
          <label class="control-label">Records Per Page</label>
          <select class="form-control field_data" name="limit" id="groupId">
                <option value="1">1</option>
                <option value="2">2</option>
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


<div class="col-md-12">
    
    
</div>
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
      
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM act WHERE IS_DELETED=0 ";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td><?=$row['ACT_NAME']?></td>
        
        	<td>
        	    
        	   <center> 
        	   <a id="view" id="hide" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?edit='.$row['ACT_NO']?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['ACT_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                          ACT_NAME: msg,
                          showConfirmButton: false,
                          timer: 1500
            });
    
   
    
}
function reLocate()
{
    window.location.href="/advocate/soft/act.php";
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
                          ACT_NAME: 'Operation Failled',
                          showConfirmButton: false,
                          timer: 1500
                        });
                 setTimeout( reLocate, 1500);
              
                <?php
                //$mgs="";
                
            }
            
            ?>


    
    
</script>




















