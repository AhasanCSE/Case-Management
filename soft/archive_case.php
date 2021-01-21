<?php include 'include/header.php';?>
<?php $table_heading = "Archived Cases";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="archive_case.php"?>
<?php $where="";?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 

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
   $all_case_no=$_GET['views'];
   
   $sql="SELECT `ALL_CASES_TITLE`,`ALL_CASES_CASE_NO`,`ALL_CASES_DESC`,`ALL_CASES_FILLING_DATE`,`ALL_CASES_HEARING_DATE`,ALL_CASES_APPOSITE_LOWYER,
   `ALL_CASES_TOTAL_FEES`,`ALL_CASES_DEW`,`IS_STAR`, location.LOCATION_NAME, clients.CLIENTS_NAME,court_category.COURT_CATEGORY_NAME,court.COURT_NAME,
   case_category.CASE_CATEGORY_NAME,case_stage.CASE_STAGE_NAME,act.ACT_NAME FROM all_cases 
   LEFT JOIN clients ON all_cases.ALL_CASES_CLIENT_NAME=clients.CLIENTS_NO
   LEFT JOIN location ON all_cases.ALL_CASES_LOCATION=location.LOCATION_NO 
   LEFT JOIN court_category ON all_cases.ALL_CASES_COURT_CATEGORY=court_category.COURT_CATEGORY_NO 
   LEFT JOIN court ON all_cases.ALL_CASES_COURT=court.COURT_NO 
   LEFT JOIN case_category ON all_cases.ALL_CASES_CASE_CATEGORY=case_category.CASE_CATEGORY_NO 
   LEFT JOIN case_stage ON all_cases.`ALL_CASES_CASE_STAGE`=case_stage.CASE_STAGE_NO 
   LEFT JOIN act ON all_cases.`ALL_CASES_ACT`=act.ACT_NO
   WHERE ALL_CASES_NO='$all_case_no'";

	$paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal" id="viewsT">
      <div class="container">
        <div class="form-group ">
            <label for="bn_title" class="control-label">Case Title : <?=$paic['ALL_CASES_TITLE']?></label>
 
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label ">Case No : <?=$paic['ALL_CASES_CASE_NO']?></label>
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Client Name : <?=$paic['CLIENTS_NAME']?></label>

        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label">Location : <?=$paic['LOCATION_NAME']?></label>
              
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label">Court Category : <?=$paic['COURT_CATEGORY_NAME']?> </label>
 
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label">Court : <?=$paic['COURT_NAME']?></label>

        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Case Category : <?=$paic['CASE_CATEGORY_NAME']?></label>
  
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Case Stage : <?=$paic['CASE_STAGE_NAME']?> </label>
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Act : <?=$paic['ACT_NAME']?></label>
               
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Description : <?=$paic['ALL_CASES_DESC']?> </label>
           
           
        </div>
    
        <div class="form-group ">
            <label for="bn_title" class="control-label">Filling Date : <?=$paic['ALL_CASES_FILLING_DATE']?></label>
            
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Hearing Date : <?=$paic['ALL_CASES_HEARING_DATE']?></label>
            
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Apposite lawyer : <?=$paic['ALL_CASES_APPOSITE_LOWYER']?></label>
            
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Total Fees : <?=$paic['ALL_CASES_TOTAL_FEES']?></label>
           
           
        </div>

        
        <div class="form-group ">
            <label for="bn_title" class="control-label">Due : <?=$paic['ALL_CASES_DEW']?></label>
         
           
        </div>
        
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
        
               <a  href="archive_case.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
    </div>    

  </form>
 
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

    $ALL_CASES_NO=$_GET['delete'];
	$sql= "UPDATE all_cases SET IS_DELETED= 1 WHERE ALL_CASES_NO='$ALL_CASES_NO'";
// 	echo $sql;
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
                                                                          <!--restore-->
                                                                          <!--restore-->
                                                                          <!--restore-->

<?php if(isset($_GET['restore']))
{
?>

<?php

    $ALL_CASES_NO=$_GET['restore'];
	$sql= "UPDATE all_cases SET IS_ARCHIVED= 0 WHERE ALL_CASES_NO='$ALL_CASES_NO'";
// 	echo $sql;
    $res= mysqli_query($con,$sql);
     if($res)
    {
        $mgs="success";
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
        	
        	<td><strong>Case Title</strong></td>
        	<td><strong>Case No</strong></td>
        	<td><strong>Client</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT `ALL_CASES_TITLE`,ALL_CASES_NO,all_cases.IS_DELETED,`ALL_CASES_CASE_NO`,`IS_STAR`, clients.CLIENTS_NAME FROM all_cases LEFT JOIN clients ON all_cases.ALL_CASES_CLIENT_NAME=clients.CLIENTS_NO WHERE all_cases.IS_ARCHIVED=1 AND all_cases.IS_DELETED='0'";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        
        
        	<td><?=$row['ALL_CASES_TITLE']?></td>
        	<td><?=$row['ALL_CASES_CASE_NO']?></td>
        	<td><?=$row['CLIENTS_NAME']?></td>
        	
        	
        	
        	<td>
        	    
        	   <center> 
        	   <a id="views"  href="<?=$targetpage.'?views='.$row['ALL_CASES_NO']?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
        	   <!--<a id="edit" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?edit='.$row['ALL_CASES_NO']?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true">Edit</i></a>-->
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['ALL_CASES_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true">Delete</i></a>
                <a onclick="return confirm('Are you Sure Want to Restore?');" href="<?=$targetpage.'?restore='.$row['ALL_CASES_NO']?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> Restore</i></a>
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
    window.location.href="/advocate/soft/archive_case.php";
}

$(document).ready(function(){
  
    
    
     if($("#view_form").is(":visible"))
        {
                $("#signupForm").hide();
                $("#add_new").hide();
                 $("#hide_search").hide();
                $("#table_hide").hide();
        }
        if( $("#viewsT").is(":visible") )
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
            if( $mgs == "success" ) 
            {
                ?>
                    
                    show( "Successfylly Restored!") ;
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
