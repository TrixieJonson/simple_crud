<html>




 <?php $mysqli = new mysqli('localhost', 'root','', 'simple_crud') or die(mysqli_error($mysqli));
//pang konek
 $regid = $_POST['regid'];
$result =$mysqli->query("SELECT *from city WHERE RegionID = $regid") or die($mysqli->error); ?>
<option value="">Choose...</option>
<?php while ($row = $result ->fetch_assoc()): ?>
	<option value="<?php echo $row['City']?>"><?php echo $row['City']?>
	</option>
 <?php endwhile; ?>
	}
</html>