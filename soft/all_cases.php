<?php include 'include/header.php';?>
<?php $table_heading = "All Cases";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php $targetpage="all_cases.php"?>
<?php $where="";$mgs="";?>
<?php 
    $user_no = 1;//$_SESSION['user']['USER_NO'];
    $CURR_TIME = date('Y-m-d : H:i:s'); 

?>

<div class="row">
    <div class ="col-md-6">
        <!--<p>all_cases</p>-->
    </div>
    <div class="col-md-6" align ="right">
            <!--<input class="primary" type="submit" value="Add New">-->
             <button type="" class="btn btn-primary" id="add_new" value = "Add_new"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
    </div>
    
</div>

                                            

 <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data" style='display:none;' >
      <div class="col-md-10">   
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Title</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="caseTitle" type="text"  />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case No</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="caseNo" type="text"  />
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Client Name</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="clientName" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT CLIENTS_NO , CLIENTS_NAME FROM clients" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['CLIENTS_NO']."'>".$value['CLIENTS_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Location</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="location" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT LOCATION_NO , LOCATION_NAME FROM location";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['LOCATION_NO']."'>".$value['LOCATION_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Court Category</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="courtCategory" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT COURT_CATEGORY_NO , COURT_CATEGORY_NAME FROM court_category";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['COURT_CATEGORY_NO']."'>".$value['COURT_CATEGORY_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Court</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="court" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT COURT_NO , COURT_NAME FROM court";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['COURT_NO']."'>".$value['COURT_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Category</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="caseCategory" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT CASE_CATEGORY_NO , CASE_CATEGORY_NAME FROM case_category";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['CASE_CATEGORY_NO']."'>".$value['CASE_CATEGORY_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Stage</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="caseStage" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT CASE_STAGE_NO , CASE_STAGE_NAME FROM case_stage";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['CASE_STAGE_NO']."'>".$value['CASE_STAGE_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Act</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="act" id = "select" >
                       <option value = "" >Select One</option>
                              <?php
                                    $query = "SELECT ACT_NO , ACT_NAME FROM act";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['ACT_NO']."'>".$value['ACT_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Description</label>
            <div class="col-lg-8">
                <textarea class=" form-control" id="" name="desc" type="text" > </textarea>
            </div>
           
        </div>
    
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Filling Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="f_date" type="date" >
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Hearing Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="h_date" type="date" >
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Apposite lawyer</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="appositeLawyer" type="text"  />
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Total Fees</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="totalFees" type="number"  />
            </div>
           
        </div>

        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Due</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="due" type="number"  />
            </div>
           
        </div>
        
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="sub" value="Save" />
               <a  href="all_cases.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
            </div>
        </div>
        
    </div> 
    
    <div class="col-md-2">
        <div class="form-group">
             <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <a  href="clients.php" class="btn btn-primary">Add New Client</a>
                
            </div>
        </div>
        
    </div>
  </form>
                                                    <!--submit-file submit-file submit-file submit-file-->
                                                  <!-- submit-file submit-file submit-file submit-file-->
                                                  <!--  submit-file submit-file submit-file submit-file-->

<?php if(isset($_POST['sub']))
{
  
    
    $caseTitle=$_POST['caseTitle'];
    $caseNo=$_POST['caseNo'];
    $clientName=$_POST['clientName'];
    $location=$_POST['location'];
    $courtCategory=$_POST['courtCategory'];
    $court=$_POST['court'];
    $caseCategory=$_POST['caseCategory'];
    $caseStage=$_POST['caseStage'];
    $act=$_POST['act'];
    $desc=$_POST['desc'];
    $f_date=$_POST['f_date'];
    $h_date=$_POST['h_date'];
    $appositeLawyer=$_POST['appositeLawyer'];
    $totalFees=$_POST['totalFees'];
    $due=$_POST['due'];

    
    $sql="INSERT INTO all_cases SET ALL_CASES_TITLE='$caseTitle',ALL_CASES_CASE_NO='$caseNo',ALL_CASES_CLIENT_NAME='$clientName',ALL_CASES_LOCATION='$location',
    ALL_CASES_COURT_CATEGORY='$courtCategory',ALL_CASES_COURT='$court',ALL_CASES_CASE_CATEGORY='$caseCategory',ALL_CASES_CASE_STAGE='$caseStage',
    ALL_CASES_ACT='$act',ALL_CASES_DESC='$desc', ALL_CASES_FILLING_DATE='$f_date',ALL_CASES_HEARING_DATE='$h_date',
    ALL_CASES_APPOSITE_LOWYER='$appositeLawyer',ALL_CASES_TOTAL_FEES='$totalFees',ALL_CASES_DEW='$due',CREATED_BY='$user_no',CREATED_ON='$CURR_TIME='";
    
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
        
               <a  href="all_cases.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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

    $all_case_no=$_GET['edit'];
    $sql="SELECT `ALL_CASES_TITLE`,`ALL_CASES_CASE_NO`,`ALL_CASES_DESC`,`ALL_CASES_FILLING_DATE`,`ALL_CASES_HEARING_DATE`,`ALL_CASES_APPOSITE_LOWYER`,
   `ALL_CASES_TOTAL_FEES`,`ALL_CASES_DEW`,`IS_STAR`,location.LOCATION_NO, location.LOCATION_NAME, clients.CLIENTS_NO,clients.CLIENTS_NAME,court_category.COURT_CATEGORY_NO,court_category.COURT_CATEGORY_NAME,court.COURT_NO,court.COURT_NAME,
   case_category.CASE_CATEGORY_NO,case_category.CASE_CATEGORY_NAME,case_stage.CASE_STAGE_NO,case_stage.CASE_STAGE_NAME,act.ACT_NO,act.ACT_NAME FROM all_cases 
   LEFT JOIN clients ON all_cases.ALL_CASES_CLIENT_NAME=clients.CLIENTS_NO
   LEFT JOIN location ON all_cases.ALL_CASES_LOCATION=location.LOCATION_NO 
   LEFT JOIN court_category ON all_cases.ALL_CASES_COURT_CATEGORY=court_category.COURT_CATEGORY_NO 
   LEFT JOIN court ON all_cases.ALL_CASES_COURT=court.COURT_NO 
   LEFT JOIN case_category ON all_cases.ALL_CASES_CASE_CATEGORY=case_category.CASE_CATEGORY_NO 
   LEFT JOIN case_stage ON all_cases.`ALL_CASES_CASE_STAGE`=case_stage.CASE_STAGE_NO 
   LEFT JOIN act ON all_cases.`ALL_CASES_ACT`=act.ACT_NO WHERE ALL_CASES_NO='$all_case_no'";

	$paic=mysqli_fetch_array(mysqli_query($con,$sql));
	


    
 ?>
                                
   <form class="cmxform form-horizontal " id="view_form" method="post" action="" enctype="multipart/form-data"  >
       
       <input type ="hidden" name ="all_case_no" value ="<?php echo $all_case_no ;?>">
       
       <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Title</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="caseTitle" type="text" value="<?=$paic['ALL_CASES_TITLE']?>" />
            </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case No</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="caseNo" type="text" value="<?=$paic['ALL_CASES_CASE_NO']?>" />
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Client Name</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="clientName" id = "select" >
                       <option value="<?=$paic['CLIENTS_NO']?>" ><?=$paic['CLIENTS_NAME']?></option>
                              <?php
                                    $query = "SELECT CLIENTS_NO , CLIENTS_NAME FROM clients" ;
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['CLIENTS_NO']."'>".$value['CLIENTS_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Location</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="location" id = "select" >
                       <option value = "<?=$paic['LOCATION_NO']?>" ><?=$paic['LOCATION_NAME']?></option>
                              <?php
                                    $query = "SELECT LOCATION_NO , LOCATION_NAME FROM location";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['LOCATION_NO']."'>".$value['LOCATION_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Court Category</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="courtCategory" id = "select" >
                       <option value = "<?=$paic['COURT_CATEGORY_NO']?>" ><?=$paic['COURT_CATEGORY_NAME']?></option>
                              <?php
                                    $query = "SELECT COURT_CATEGORY_NO , COURT_CATEGORY_NAME FROM court_category";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['COURT_CATEGORY_NO']."'>".$value['COURT_CATEGORY_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Court</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="court" id = "select" >
                       <option value = "<?=$paic['COURT_NO']?>" ><?=$paic['COURT_NAME']?></option>
                              <?php
                                    $query = "SELECT COURT_NO , COURT_NAME FROM court";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['COURT_NO']."'>".$value['COURT_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Category</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="caseCategory" id = "select" >
                       <option value = "<?=$paic['CASE_CATEGORY_NO']?>" ><?=$paic['CASE_CATEGORY_NAME']?></option>
                              <?php
                                    $query = "SELECT CASE_CATEGORY_NO , CASE_CATEGORY_NAME FROM case_category";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['CASE_CATEGORY_NO']."'>".$value['CASE_CATEGORY_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Case Stage</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="caseStage" id = "select" >
                       <option value = "<?=$paic['CASE_STAGE_NO']?>" ><?=$paic['CASE_STAGE_NAME']?></option>
                              <?php
                                    $query = "SELECT CASE_STAGE_NO , CASE_STAGE_NAME FROM case_stage";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['CASE_STAGE_NO']."'>".$value['CASE_STAGE_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Act</label>
               <div class="col-lg-8">
                    <select class="form-control mr-sm-2" name="act" id = "select" >
                       <option value = "<?=$paic['ACT_NO']?>" ><?=$paic['ACT_NAME']?></option>
                              <?php
                                    $query = "SELECT ACT_NO , ACT_NAME FROM act";
                                    $result = mysqli_query ( $con , $query ) ;
                                    
                                    foreach( $result as $value )
                                    {
                                        echo "<option value = '".$value['ACT_NO']."'>".$value['ACT_NAME']."</option>";
                                    }
                              ?>
 
                    </select>
                </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Description</label>
            <div class="col-lg-8">
                <textarea class=" form-control" id="" name="desc" type="text"><?=$paic['ALL_CASES_DESC']?></textarea>
            </div>
           
        </div>

    
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Filling Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="f_date" type="date"  value="<?=$paic['ALL_CASES_FILLING_DATE']?>" >
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Hearing Date</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="h_date" type="date"  value="<?=$paic['ALL_CASES_HEARING_DATE']?>" >
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Apposite lawyer</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="appositeLawyer" type="text"  value="<?=$paic['ALL_CASES_APPOSITE_LOWYER']?>" />
            </div>
           
        </div>
        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Total Fees</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="totalFees" type="number"  value="<?=$paic['ALL_CASES_TOTAL_FEES']?>" />
            </div>
           
        </div>

        
        <div class="form-group ">
            <label for="bn_title" class="control-label col-lg-2">Due</label>
            <div class="col-lg-8">
                <input class=" form-control" id="" name="due" type="number"  value="<?=$paic['ALL_CASES_DEW']?>" />
            </div>
           
        </div>
        
        
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-5">
               <input type="submit" id ="btnSubmit" class="btn btn-primary" name="update" value="Update" />
               <a  href="all_cases.php" class="btn btn-primary"><i class="fa fa-back" aria-hidden="true"></i>Back</a>
                
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
 
    $all_case_no=$_POST['all_case_no'];
  
    $caseTitle=$_POST['caseTitle'];
    $caseNo=$_POST['caseNo'];
    $clientName=$_POST['clientName'];
    $location=$_POST['location'];
    $courtCategory=$_POST['courtCategory'];
    $court=$_POST['court'];
    $caseCategory=$_POST['caseCategory'];
    $caseStage=$_POST['caseStage'];
    $act=$_POST['act'];
    $desc=$_POST['desc'];
    $f_date=$_POST['f_date'];
    $h_date=$_POST['h_date'];
    $appositeLawyer=$_POST['appositeLawyer'];
    $totalFees=$_POST['totalFees'];
    $due=$_POST['due'];

    
    $sql="UPDATE all_cases SET ALL_CASES_TITLE='$caseTitle',ALL_CASES_CASE_NO='$caseNo',ALL_CASES_CLIENT_NAME='$clientName',ALL_CASES_LOCATION='$location',
    ALL_CASES_COURT_CATEGORY='$courtCategory',ALL_CASES_COURT='$court',ALL_CASES_CASE_CATEGORY='$caseCategory',ALL_CASES_CASE_STAGE='$caseStage',
    ALL_CASES_ACT='$act',ALL_CASES_DESC='$desc', ALL_CASES_FILLING_DATE='$f_date',ALL_CASES_HEARING_DATE='$h_date',
    ALL_CASES_APPOSITE_LOWYER='$appositeLawyer',ALL_CASES_TOTAL_FEES='$totalFees',ALL_CASES_DEW='$due',UPDATED_BY='$user_no',
   UPDATED_ON='$CURR_TIME=' WHERE ALL_CASES_NO='$all_case_no'";
   
   //echo $sql;
    
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

    $ALL_CASES_NO=$_GET['delete'];
	$sql= "UPDATE all_cases SET IS_ARCHIVED= 1 WHERE ALL_CASES_NO='$ALL_CASES_NO'";
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
        	<td><strong>Star</strong></td>
        	<td><strong>Case Title</strong></td>
        	<td><strong>Case No</strong></td>
        	<td><strong>Client</strong></td>
        	<td><strong>Action</strong></td>
        
        </tr>
            </thead>
    <?php
    // echo $where;
	$sql= "SELECT `ALL_CASES_NO`, `ALL_CASES_TITLE`,ALL_CASES_NO,all_cases.IS_ARCHIVED,`ALL_CASES_CASE_NO`,`IS_STAR`, clients.CLIENTS_NAME FROM all_cases LEFT JOIN clients ON all_cases.ALL_CASES_CLIENT_NAME=clients.CLIENTS_NO WHERE all_cases.IS_ARCHIVED='0'";
	$sql .= $where ;
    $query=mysqli_query($con,$sql);
 
		$i = 1;
		while($row = mysqli_fetch_array($query)):
	?>
    	 <tbody id="myTable">
    	<tr>
        	<td><?=$i++?></td>
        	<td class="small-col ">
                <p style="text-align:center;">
                <i id="bol" identity = "<?=$row['ALL_CASES_NO']?>" style="color: #72afd2;" 
                
                <?php 
                if($row['IS_STAR']==1)
                {
                    echo "class='fa fa-star fa-2x Public'";
                }
                else
                {
                    
                    echo "class='fa fa-star-o fa-2x Public'";
                }
                
                
                ?>

                ></i></p>
            </td>
        
        	<td><?=$row['ALL_CASES_TITLE']?></td>
        	<td><?=$row['ALL_CASES_CASE_NO']?></td>
        	<td><?=$row['CLIENTS_NAME']?></td>
        	
        	
        	
        	<td>
        	    
        	   <center> 
        	   <a id="views"  href="<?=$targetpage.'?views='.$row['ALL_CASES_NO']?>" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
        	   <a id="edit" onclick="return confirm('Are you Sure Want to View?');" href="<?=$targetpage.'?edit='.$row['ALL_CASES_NO']?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true">Edit</i></a>
               <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['ALL_CASES_NO']?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Archive</i></a>
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
    window.location.href="/advocate/soft/all_cases.php";
}

function check( is_start , id )
{
    $.ajax( { 
        
        url: "checker.php",
        method : "post" ,
        data : ({ "start": is_start , "id1" : id }),
        dataType: "html",
        success: function( Result )
        {
            reLocate();
        }
        
    }) ;
    
    
}

$(document).ready(function(){
 
         $(document).on("click", ".Public",function( ){
             
             var id = $(this).attr("identity") ;
            
             check( "is_start", id ) ;
            
             
             
         });
         
         
    
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
                    
                    show( "Successfylly Archived!") ;
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
