<?php include('../includes/Database.php'); ?>
<?php 

	session_start();
	if(empty($_SESSION))
	{
		header('location:login.php?login=You need to Login or Sign Up');
	}
	else
	{
		include('includes/login-header.php');
	}

?>
<?php
	
	$db = new Database();
	//$query4 = "SELECT t1.id as cid,t1.name,t1.companyid,t1.type,t1.headquarter,t1.website,t1.email,t1.logo  FROM company_master as t1 left join company_type as t2 on t1.type=t2.id";
    $record_per_page = 2;
    $page = '';
    if(isset($_GET['page']))
    {
      $page = $_GET['page'];
    }
    else
    {
      $page = 1;
    }
    $start_from = ($page-1)*$record_per_page;
	$query4 = "SELECT * FROM company_master t1 left join company_type as t2 on t1.type=t2.id LIMIT $start_from,$record_per_page";
	$row4 = $db->select($query4);

?>
<?php

	$query = "SELECT COUNT(*) FROM request_to_college WHERE collegeid='".$_SESSION['college']."' and status = 'pending'";
	$request = $db->select($query);
	$count = $request->fetch_array();
	//print_r($count);

?>
<?php if(isset($_GET["msg"])) : ?>
  				
  	<center><div class="alert alert-success"><?php  echo htmlentities($_GET["msg"]); ?></div></center>

<?php endif; ?>
<div class="container-fluid">
<div class="row">
	<div class="col-xs-2 body-left-company" style="padding-top: 70px;">
	<center>
		<a href="view-response.php" class="btn btn-primary">View Responses</a>
		<br><br>
		<a href="requests.php?id=" class="btn btn-primary">View Requests &nbsp;&nbsp;<?php echo $count['0']; ?></a>
		<br>
	</center>
	</div>
	<div class="col-xs-10 body-middle-company">


	<?php  while($company = $row4->fetch_assoc()): ?>

		<div class="company-post">
			<div class="col-xs-9">
				<h2><?php echo $company["name"]; ?></h2>
				<table class="table">
					<tr><td colspan="2">Id : <?php echo $company["companyid"]; ?></td></tr>
					<tr><th>Type: </th><th>HeadQuarter : </th><th>Email : </th><th>Website : </th></tr>
					<tr><th><?php echo $company["type"]; ?></th><th><?php echo $company["headquarter"]; ?></th><th><?php echo $company["website"]; ?></th><th><?php echo $company["email"]; ?></th></tr>
				</table>
			</div>
			<div class="col-xs-3">
				<img src="../company/logo/<?php echo $company["logo"]; ?>" height="100px" width="150px" class="logo-company">
				<br><br>
				<a href="companydetails.php?id=<?php echo $company["cid"]; ?>" class="btn btn-primary knowmore-company">know more</a>
			</div>
		</div>
	<?php endwhile; ?>
<br>
                   <div align="center">

                        <?php

                            $query = "SELECT * FROM company_master";
                            $page_result = mysqli_query($db->link,$query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            $i = 2;
                            $j = $i-1;
                            if(isset($_GET["page"]))
                            {
                                $i = $_GET["page"];
                                if($i == $total_pages)
                                {
                                    $i = 1;
                                }
                                else
                                {
                                    $i++;
                                }
                            }
                        ?>

                              <a href="index.php?page=<?php echo $j; ?>" class="btn btn-primary input">Previous</a>
                              <a href="index.php?page=<?php echo $i; ?>" class="btn btn-primary input">Next</a>

                    </div>
                    <br>
	</div>
</div>
</div>

<?php include("includes/footer.php") ?>