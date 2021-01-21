<?php include 'include/header.php';?>
<?php $table_heading = "Holidays list";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="holidays.php"?>
<?php $where=""; $mgs= ""?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 
    $limit='5';
    $where=" ORDER BY HOLIDAY_NO DESC LIMIT $limit";

?>


<div class="row">
    <div class ="col-md-6">
        <p>Holidays</p>
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
             <button type="" class="btn btn-primary" id="setup" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>Setup</button>
             
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style= "display:none;" >
         <div class="col-md-10">
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Occasion</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="title" type="text"  />
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
               <a  href="holidays.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
             
                
            </div>
        </div>
        </div>
        
  </form>
  
   
  
  
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->
                                                  
                                                  
                                                  
                                                  

<?php if(isset($_POST['sub']))
{
  
    $title=$_POST['title'];
    $date=$_POST['date'];
    
    $sql="SELECT DATE from holiday WHERE DATE=$date";
    $COUNT = mysqli_num_rows(mysqli_query($con,$sql));
    

    
    $sql="INSERT INTO holiday SET TITLE='$title',DATE='$date',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";
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
                                                             <!--set form-->
      <form class="cmxform form-horizontal " id="setform" method="post" action="" enctype="multipart/form-data" style= "display:none;" >
         <div class="col-md-10">
        <div class="form-group">
            <label for="bn_title" class="control-label col-lg-2">Occasion</label>
            <div class="col-lg-8">
                <input class="form-control" id="" name="occation" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Holiday Name : </label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="kibar" id = "select_type" >
                    <option value = "Fri" >Friday</option>
                     <option value = "Sat" >Saturday</option>
                     <option value = "Sun" >Sunday</option>
                     <option value = "Mon" >Monday</option>
                     <option value = "Tue" >Tuesday</option>
                     <option value = "Wed" >Wednesday</option>
                     <option value = "Thu" >Thursday</option>
                   
                     </select>
                </div>
           
        </div>
       
       
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2"> Sart Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="sdate" type="date"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2"> End Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="ldate" type="date"  />
            </div>
           
        </div>
       
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="setbtn" class="btn btn-primary" name="setsave" value="Save" />
               <a  href="holidays.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
             
                
            </div>
        </div>
        </div>
        
  </form>
   
  
  
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->
                                                  
                                                  
                                                  
                                                  

<?php if(isset($_POST['setsave']))
{
     $kibar=$_POST['kibar'];
    $occation=$_POST['occation'];
    $sdate=$_POST['sdate'];

    $ldate=$_POST['ldate'];
    

	while (strtotime($sdate) <= strtotime($ldate)) {
	    
	        $day=date('D', strtotime($sdate));
              if($day==$kibar)
              {
                 
                 
                 
                 
                   $sql="INSERT INTO holiday SET TITLE='$occation',DATE='$sdate',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME'";
                   $res=mysqli_query($con,$sql);
              
              }
                
               
                $sdate = date ("Y-m-d", strtotime("+1 day", strtotime($sdate)));
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

    $holiday_no=$_GET['view'];
	$sql= "SELECT *FROM holiday WHERE IS_DELETED=0 AND HOLIDAY_NO='$holiday_no'";
    $paic=mysqli_fetch_array(mysqli_query($con,$sql));

    
 ?>
                                
<form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
         
         <input type ="hidden" name = "holiday_no" value = "<?php echo $holiday_no ; ?>">
         
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Occasion</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="title" type="text" value="<?= $paic['TITLE']?>"  />
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
                

             <a  href="holidays.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
 
    $holiday_no=$_POST['holiday_no'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $date=$_POST['date'];
   
         $sql="UPDATE holiday SET TITLE='$title',DATE='$date',UPDATED_BY='$user_no',UPDATED_ON='$CURR_TIME'  WHERE HOLIDAY_NO='$holiday_no' ";
         $res=mysqli_query($con,$sql);
  
         if($res)
    {
        $mgs="updatet";
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

    $holiday_no=$_GET['delete'];
	$sql= "UPDATE holiday SET IS_DELETED= 1 WHERE HOLIDAY_NO='$holiday_no'";
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
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="20">200</option>
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
 $where="ORDER BY HOLIDAY_NO DESC LIMIT $limit";
 }
 ?>
                             


<table id="table_hide" class="table table-bordered" style ="margin-top:50px;">
        <thead>	
    	<tr>
        	<td><strong>Sr No</strong></td>
        	<td><strong>Occasion</strong></td>
        	<td><strong>Date</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT *FROM holiday WHERE IS_DELETED=0 ";
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
        	   <a id="view" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?view='.$row['HOLIDAY_NO']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['HOLIDAY_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    window.location.href="/advocate/soft/holidays.php";
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
     $("#setup").on("click",function(){
        
        $("#setform").show();
        $("#signupForm").hide();
        $("#add_new").hide();
        $("#setup").hide();
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
             else if($mgs== "duplicate")
            {
                ?>
                Swal.fire({
                          position: 'top-middle',
                          type: 'error',
                          title: 'Duplicate Date',
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
























