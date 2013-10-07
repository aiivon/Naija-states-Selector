<?php
require_once('conn.php');
$state_of_origin = $_REQUEST['state'];

    mysql_select_db($database_conn, $conn);
$query_lga = "SELECT * FROM lga Where state_id = '{$state_of_origin}' ORDER BY name ASC";
$lga = mysql_query($query_lga, $conn) or die(mysql_error());
$row_lga = mysql_fetch_assoc($lga);
$totalRows_lga = mysql_num_rows($lga);
echo '<option> Select LGA </option>';




do {  
?>
  <option value="<?php echo $row_lga['id']?>"><?php echo $row_lga['name']?></option>
  <?php
} while ($row_lga = mysql_fetch_assoc($lga));
  $rows = mysql_num_rows($lga);
  if($rows > 0) {
      mysql_data_seek($lga, 0);
	  $row_lga = mysql_fetch_assoc($lga);
  }
?>

<?php mysql_free_result($lga);?>
