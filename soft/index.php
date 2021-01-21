<?php include 'include/header.php';?>
<?php $table_heading = "Dashboard";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>


 <link rel="stylesheet" type="text/css" href="http://jothashilpa.com/css/client_dashboard.min.css"> 
 <style>
 	.dashboard-stat.green-jungle .details .desc{
 		margin-left:0px;
 	}
 	.dashboard-stat.purple .details .desc{
 		margin-left:0px;
 	}
 	.dashboard-stat.red .details .desc{
 		margin-left:0px;
 	}	
 	.dashboard-stat .details{
 		right: 15px;
 	}
 	.visual img{
 		height: 75px;
 	}
 	.dashboard-stat .visual>img {
	    margin-left: -10px;
	}
	.dashboard-stat.blue-hoki .details .desc{
		margin-left: 0px;
	}
	.dashboard-stat.blue-madison .details .desc{
		margin-left: 0px;
	}
	
	.dashboard-stat:hover i{
	    
	    font-size: 150px !important;
        color: black !important;
        float:left !important;
        text-align:center;
	}
	
/*	.visual:hover{*/
/*    cursor: pointer;*/
/*    font-size: 28px !important;*/
/*    color: red !important;*/
/*}*/
/*.visual{*/
/*  float:left;*/
/*   width:30px;   */
/*  text-align:center;*/
/*}*/
	
 </style>
	<div class="row">
	    
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a href="clients.php">
				<div class="dashboard-stat blue">
					<div class="visual"><i class=" visual fa fa-users" aria-hidden="true"></i></div>
					<div class="details">
						<div class="desc">Clients</div>
					</div>
					<a class="more" href="clients.php"> View more
						<i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</a>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat purple">
	            <div class="visual"><i class="fa fa-user"></i></div>
	            <div class="details">
	                
	                <div class="desc">Employees</div>
	            </div>
	            <a class="more" href="hrm_incriment_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat green-jungle">
	            <div class="visual"> <i class="fa fa-align-justify"></i></div>
	            <div class="details">
	                
	                <div class="desc">Cases</div>
	            </div>
	            <a class="more" href="hrm_transfer_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat blue">
	            <div class="visual"><i class="fa fa-edit"></i></div>
	            <div class="details">
	                
	                <div class="desc"> Resignation  </div>
	            </div>
	            <a class="more" href="hrm_resignation_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat red">
	            <div class="visual"><i class="fa fa-book" aria-hidden="true"></i></div>
	            <div class="details ">
	                
	                <div class="desc">Cases Study</div>
	            </div>
	            <a class="more" href="hrm_leave_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat blue">
	            <div class="visual"><i class="fa fa-inbox"></i></div>
	            <div class="details">
	               
	                <div class="desc">My Tasks</div>
	            </div>
	            <a class="more" href="hrm_transfer_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat yellow">
	            <div class="visual"><i class="fa fa-star"></i></i></div>
	            <div class="details">
	                
	                <div class="desc">Starred Cases</div>
	            </div>
	            <a class="more" href="hrm_transfer_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    	<div class="dashboard-stat red">
	            <div class="visual"><i class="fa fa-archive"></i></div>
	            <div class="details">
	                
	                <div class="desc">Archived Cases</div>
	            </div>
	            <a class="more" href="hrm_transfer_approval.php"> View more
	                <i class="m-icon-swapright m-icon-white"></i>
	            </a>
	        </div>
	    </div>
	    
	    
	    
	    
	    
	</div>

























 <?php include 'include/footer.php';?>