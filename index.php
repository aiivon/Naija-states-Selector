<?php require_once('conn.php'); 
mysql_select_db($database_conn, $conn);
$query_states = "SELECT * FROM states ORDER BY name ASC";
$states = mysql_query($query_states, $conn) or die(mysql_error());
$row_states = mysql_fetch_assoc($states);
$totalRows_states = mysql_num_rows($states);?>
<html>
<head>
</head>
<body>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script>    $(document).ready(function()
    {
    $("#state_of_origin").change(function()
    {
    var state = $(this).val();//get select value
    $.ajax(
    {
    url:"select_lga.php",
    type:"post",
    data:{state:$(this).val()},
    success:function(response)
    {
    $("#lga_of_origin").html(response);
    }
    });
    });
    });
    </script>

                  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="register" >
                    <table align="center">
                      
                     
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">State of origin:</td>
                        <td><select name="state_of_origin" id="state_of_origin" required>
                          <option> Select State </option><?php
do {  
?>
                          <option value="<?php echo $row_states['id']?>" id="<?php echo $row_states['id']?>"><?php echo $row_states['name']?></option>
                          <?php
} while ($row_states = mysql_fetch_assoc($states));
  $rows = mysql_num_rows($states);
  if($rows > 0) {
      mysql_data_seek($states, 0);
	  $row_states = mysql_fetch_assoc($states);
  }
?>
                        </select></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">Local Govt. of origin:</td>
                        <td><select name="lga_of_origin" id="lga_of_origin"> <option> </option> </select> </td>
                      </tr>
                     
                    </table>
                    <input type="hidden" name="status" value="" />
                    <input type="hidden" name="MM_insert" value="form1" />
                  </form>
                 </body>
                 </html>
                 <?php 
mysql_free_result($states);
?>
