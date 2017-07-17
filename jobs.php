<?php include('includes/Database.php'); ?> 
<?php include('includes/header.php'); ?>
<?php
	
	$db = new Database();
	$query1 = "SELECT * FROM job_types";
	$row1 = $db->select($query1);	

	$query2 = "SELECT * FROM experience";
	$row2 = $db->select($query2);

	$query3 = "SELECT * FROM location";
	$row3 = $db->select($query3);

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
	$query4 = "SELECT * FROM jobs as t1 left join location as t2 on t1.place=t2.place_id ORDER BY id DESC LIMIT $start_from,$record_per_page";
	$row4 = $db->select($query4);

?>
<?php

	session_start();
	if(isset($_REQUEST['knowmore']))
	{
		if(!$_SESSION['college'] || !$_SESSION['student'])
		{
			header('location:jobs.php?msg=You Have to login as a student or as a college.');
		}
		else
		{
			if($_SESSION['student'])
			{
				header('location:student/index.php');
			}
			if($_SESSION['college'])
			{
				header('location:college/jobs.php');
			}
		}
	}

?>
<?php  if(isset($_GET['msg'])): ?>

	<center><div class="alert alert-success" style="margin-top: 40px;margin-bottom: 0px;"><?php echo urldecode($_GET['msg']) ;?></div></center>

<?php endif; ?>
<style type="text/css">
	body{
		margin-top: 0px;
	}
	.knowmore{
		margin-left: 30px;
	}
</style>
   <script type="text/javascript">
      $(document).ready(function(){
        $("#sel").change(function(){
         var did =$(this).val();
         // alert(did);
            $.ajax({
      				type:'post',
      				url : 'libraries/select-location.php',
      				data:{"did":did},
      				success:function(res)
      				{
      					// alert(res);
      					$("#jobdiv").html(res);
      					//window.location.reload();
      				}
      			});
        });
      });
    </script>
 	    <script type="text/javascript">
      $(document).ready(function(){
        $("#type").change(function(){
         var typeid =$(this).val();
         // alert(typeid);
            $.ajax({
      				type:'post',
      				url : 'libraries/select-type.php',
      				data:{"did":typeid},
      				success:function(res)
      				{
      					
      					$("#jobdiv").html(res);
      					//window.location.reload();
      				}
      			});
        });
      });
    </script>
       
 	<script type="text/javascript">
      $(document).ready(function(){
        $("#exp").change(function(){
         var exp =$(this).val();
         // alert(typeid);
            $.ajax({
      				type:'post',
      				url : 'libraries/select-experience.php',
      				data:{"did":exp},
      				success:function(res)
      				{
      					
      					$("#jobdiv").html(res);
      					//window.location.reload();
      				}
      			});
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#salary").keypress(function(e){
         var salary =$(this).val();
         // alert(salary);
          if(e.which==13)
          {
          	$.ajax({
      				type:'post',
      				url : 'libraries/select-salary.php',
      				data:{"did":salary},
      				success:function(res)
      				{
      					
      					$("#jobdiv").html(res);
      					//window.location.reload();
      				}
      			});
          }
            
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#date").keypress(function(e){
         var date =$(this).val();
          //alert(date);
          if(e.which==13)
          {
          	$.ajax({
      				type:'post',
      				url : 'libraries/select-date.php',
      				data:{"did":date},
      				success:function(res)
      				{
      					
      					$("#jobdiv").html(res);
      					//window.location.reload();
      				}
      			});
          }
            
        });
      });
    </script>
<div class="container-fluid" style="margin-top: 0px;">
<div class="row">
	<div class="col-xs-3 body-left-job" style="padding-left: 30px;padding-right: 30px;">
		<center><h3><p>Filters</p></h3></center>
	    
	      <div class="form-group">
	      	<label>By Place : </label>
						<select class="form-control" name="place" id='sel'>
							<?php
								$result3=mysqli_fetch_all($row3,MYSQLI_ASSOC);
								foreach($result3 as $k3)
								{
									echo "<option value='".$k3["place_id"]."' >".$k3["location"]."</option>";
								}
							?>
						</select>
	      </div>
	      <!-- <input type="submit" class="btn btn-default" value="Apply" style="margin-left: 210px;"> -->
	      
	     
					<div class="form-group">
						<label>By Job Type : </label>
						<select class="form-control" name="type" id="type">
							<?php
								$result1=mysqli_fetch_all($row1,MYSQLI_ASSOC);
								foreach($result1 as $k1)
								{
									echo "<option value='".$k1["id"]."'>".$k1["type"]."</option>";
								}
							?>
						</select>
					</div>
			<!-- <input type="submit" class="btn btn-default" value="Apply" style="margin-left: 210px;"> -->
	    
	    
					<div class="form-group">
						<label>By Experience : </label>
						<select class="form-control" name="type" id="exp">
							<?php
								$result1=mysqli_fetch_all($row2,MYSQLI_ASSOC);
								foreach($result1 as $k1)
								{
									echo "<option value='".$k1["id"]."'>".$k1["experience"]."</option>";
								}
							?>
						</select>
					</div>
			<!-- <input type="submit" class="btn btn-default" value="Apply" style="margin-left: 210px;"> -->
	    
	    	<div class="form-group">
	    		<label>By Salary</label>
	    		<input type="text" name="salary" placeholder="Enter minimum salary" class="form-control" id="salary">
	    	</div>
					<div class="form-group">
						<label>By date : </label>
						<input type="date" name="date" placeholder="Enter Last date" class="form-control" id="date">
					</div>
	    	<!-- <input type="submit" class="btn btn-default" value="Apply" style="margin-left: 210px;"> -->
	   
	</div>
	<div class="col-xs-9 body-middle-job" id="jobdiv">

	<?php  while($jobs = $row4->fetch_assoc()): ?>

		<div class="post-job">
			<div class="col-xs-9" style="">
				<h3><?php echo $jobs["title"]; ?></h3>
				<table class="table">
					<tr><td colspan="2"><?php echo $jobs["companyid"]; ?></td></tr>
					<tr><th>Place : </th><th> salary</th><th>posted on : </th><th>last date : </th></tr>
					<tr><th><?php echo $jobs["location"]; ?></th><th><?php echo $jobs["salary"]; ?></th><th><?php echo $jobs["lastdate"]; ?></th><th><?php echo $jobs["lastdate"]; ?></th></tr>
				</table>
			</div>
			<div class="col-xs-3">
				<img src="company/logo/<?php echo $jobs["companyid"]; ?>.jpg" height="100px" width="150px">
				<br><br>
				<form><input type="submit" name="knowmore" class="btn btn-primary knowmore" value="Know More"></form>
			</div>
		</div>
	<?php endwhile; ?>
 <br>
                   <div align="center">

                        <?php

                            $query = "SELECT * FROM jobs";
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

                              <a href="jobs.php?page=<?php echo $j; ?>" class="btn btn-primary input">Previous</a>
                              <a href="jobs.php?page=<?php echo $i; ?>" class="btn btn-primary input">Next</a>

                    </div>
	</div>
</div>
</div>

<?php include 'includes/footer.php'; ?>
