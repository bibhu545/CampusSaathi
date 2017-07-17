<?php include('../includes/Database.php'); ?>
<?php include('includes/header.php'); ?>

<?php

  $db = new Database();
  $query1 = "SELECT * FROM college_type";

  $row = $db->select($query1); 

?>
<?php

  $db = new Database();
  $query2 = "SELECT * FROM company_type";

  $company = $db->select($query2); 

?>
<?php

  $db = new Database();
  $query3 = "SELECT * FROM location";

  $location = $db->select($query3); 

?>
<?php

  $db = new Database();
  $query4 = "SELECT * FROM duration";

  $duration = $db->select($query4); 

?>

	
       
        <table class="table table-striped" id="college">
          <tr><th>Type Id#</th><th>College Type</th><th>Action</th></tr>
          <?php while($r = $row->fetch_assoc()): ?>
            <tr>
              <td><?php echo $r["id"]; ?></td>
              <td><?php echo $r["type"]; ?></td>
              <td><a href="delete-college.php?id=<?php echo $r['id'] ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>
            </tr>
          <?php endwhile; ?>
        </table>
        <br><br>
        <table class="table table-striped" id="company">
          <tr><th>Type Id#</th><th>Company Type</th><th>Action</th></tr>
          <?php while($arr = $company->fetch_assoc()): ?>
            <tr>
              <td><?php echo $arr["id"]; ?></td>
              <td><?php echo $arr["type"]; ?></td>
              <td><a href="delete-company.php?id=<?php echo $arr['id'] ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>
            </tr>
          <?php endwhile; ?>
        </table>
        <br><br>
        <table class="table table-striped" id="location">
          <tr><th>Type Id#</th><th>Locations</th><th>Action</th></tr>
          <?php while($arr = $location->fetch_assoc()): ?>
            <tr>
              <td><?php echo $arr["place_id"]; ?></td>
              <td><?php echo $arr["location"]; ?></td>
              <td><a href="delete-location.php?id=<?php echo $arr['place_id'] ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>
            </tr>
          <?php endwhile; ?>
        </table>
        <br><br>
        <table class="table table-striped" id="duration">
          <tr><th>Type Id#</th><th>Durations </th><th>Action</th></tr>
          <?php while($arr = $duration->fetch_assoc()): ?>
            <tr>
              <td><?php echo $arr["id"]; ?></td>
              <td><?php echo $arr["duration"]; ?></td>
              <td><a href="delete-duration.php?id=<?php echo $arr['id'] ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>
            </tr>
          <?php endwhile; ?>
        </table>

        </div>	
  		</div>
  	</div>

<?php include('includes/footer.php') ?>