<?php include 'include/header.php';?>
<?php $table_heading = "Case Study";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="case_study.php"?>
<?php $where="";$mgs="";?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 

?>

<div class="row">
    <div class ="col-md-6">
        <!--<p>case_study</p>-->
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style='display:none;' >
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Name</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="Name" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Category</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="caseCat" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT CASE_CATEGORY_NO, CASE_CATEGORY_NAME FROM case_category" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value ='".$value['CASE_CATEGORY_NO']."'>".$value['CASE_CATEGORY_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Notes</label>
            <div class="col-lg-8">
                <textarea class=" form-control" id="" name="notes" type="text" style="width:729px; height:107px;"></textarea>
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Result</label>
            <div class="col-lg-8">
                <textarea class=" form-control" id="" name="result" type="text" style="width:729px; height:107px;"></textarea>
            </div>
           
        </div>
        

        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
               <a  href="case_study.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
  </form>
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->

<?php if(isset($_POST['sub']))
{
  
    $Name=$_POST['Name'];
    $caseCat=$_POST['caseCat'];
    $result=$_POST['result'];
    $notes=$_POST['notes'];
  
    
    $sql="INSERT INTO case_study SET CASE_STUDY_TITLE='$Name',CASE_STUDY_NOTES='$notes',CASE_STUDY_RESULT='$result',CASE_STUDY_CATEGORY='$caseCat',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";
   // echo $sql;
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

    $CASE_STUDY_NO=$_GET['views'];
	$sql= "SELECT * FROM `case_study` LEFT JOIN case_category ON case_study.CASE_STUDY_CATEGORY=case_category.CASE_CATEGORY_NO WHERE CASE_STUDY_NO='$CASE_STUDY_NO'";
    $paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view" >
        
       <div class="container"> 
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Name : <?= $paic['CASE_STUDY_TITLE']?> </label>
  
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Notes : <?= $paic['CASE_STUDY_NOTES']?> </label>
   
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Result : <?= $paic['CASE_STUDY_RESULT']?></label>
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg">Case Category : <?= $paic['CASE_CATEGORY_NAME']?></label>
        </div>
        
        <div class="form-group">
           <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
             <a  href="case_study.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
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
      
  
    $CASE_STUDY_NO=$_GET['edit'];
	$sql= "SELECT * FROM `case_study` LEFT JOIN case_category ON case_study.CASE_STUDY_CATEGORY=case_category.CASE_CATEGORY_NO WHERE CASE_STUDY_NO='$CASE_STUDY_NO'";
    $paic=mysqli_fetch_array(mysqli_query($con,$sql));
	

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "CASE_STUDY_NO" value = "<?php echo $CASE_STUDY_NO ;?>">
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Name :</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="name" type="text" value="<?= $paic['CASE_STUDY_TITLE']?>"  />
            </div>
           
        </div>
  
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Notes :</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="notes" type="text" value="<?= $paic['CASE_STUDY_NOTES']?>" />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Resultr :</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="res" type="text" value="<?= $paic['CASE_STUDY_RESULT']?>" />
            </div>
           
        </div>
 
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Category</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="caseCat" id = "select" >
                       <option value = "<?= $paic['CASE_CATEGORY_NO']?>" ><?= $paic['CASE_CATEGORY_NAME']?></option>
                              <?php
                                    $query = "SELECT CASE_CATEGORY_NO , CASE_CATEGORY_NAME FROM case_category" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value ='".$value['CASE_CATEGORY_NO']."'>".$value['CASE_CATEGORY_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
                
         <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmt" class="btn btn-primary" name="update" value="Update" />
                
             <a  href="case_study.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
 
    $CASE_STUDY_NO=$_POST['CASE_STUDY_NO'];
    $Name=$_POST['name'];
    $notes=$_POST['notes'];
    $res=$_POST['res'];
    $caseCat=$_POST['caseCat'];
    
   
         $sql="UPDATE case_study SET CASE_STUDY_NO='$CASE_STUDY_NO',
         CASE_STUDY_NOTES='$notes',CASE_STUDY_TITLE='$Name',CASE_STUDY_RESULT='$res',CASE_STUDY_CATEGORY='$caseCat',UPDATED_BY='$user_no',UPDATED_ON='$CURR_TIME' WHERE CASE_STUDY_NO='$CASE_STUDY_NO'";
         
  
   
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

    $CASE_STUDY_NO=$_GET['delete'];
	$sql= "UPDATE case_study SET IS_DELETED= 1 WHERE CASE_STUDY_NO='$CASE_STUDY_NO'";
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
        	<td><strong>Title</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM case_study WHERE IS_DELETED=0 ";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td><?=$row['CASE_STUDY_TITLE']?></td>
        	
        	<td>
        	    
        	   <center> 
        	    <a id="views"  href="<?=$targetpage.'?views='.$row['CASE_STUDY_NO']?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
        	   <a id="edit" onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['CASE_STUDY_NO']?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['CASE_STUDY_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    window.location.href="/advocate/soft/case_study.php";
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

























