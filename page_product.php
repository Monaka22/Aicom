<?php
if($_SESSION["UserID"]==""){
	echo "Please Login!";
	exit();
}
	if($_SESSION["Status"] !="ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}
?>
<table width="569" height="255"  border="0" class="square">
  <tr>
    <td bgcolor="#00CC66"><div align="center"><h1>Product</h1>
    </div></td>
  </tr>
</table>