<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<?php include "conect.php" ;?>
<link href ="style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restor){
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
}
-->
</script>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="table table-bordered">
	<tr>
		<td colspan="4" align="right" bgcolor="#F7F7F7">
		<form id="from1" name="form1" method="post" action="">
		<select name="menu1" onchange="MM_jumpMenu('parent',this,0)">
		<option value="?"<?php if(empty($_GET['c_id']))
		{
			echo 'selected="selected"';
		}
		?>> All </option>
	<?php
		$strSQL = "SELECT * FROM product_type";
		$objQuery = $mysqli->query($strSQL);
		$num = mysqli_num_rows($objQuery);
		for($i=1;$i<=$num;$i++)
		{
			$objResult = mysqli_fetch_assoc($objQuery);
	?>
<option value="?c_id=<?php echo $objResult['typeid']?>"  <?php if(@$_GET['c_id']== $objResult["typeid"]) {echo 'selected="selected"'; } ?>>
<?php echo $objResult['typename']?></option>
<?php } ?>
</select>
  </form>
  </td>
  </tr>
        <tr>
		<td width="91" align="center" bgcolor="#cccccc"><strong>image</strong></td>
		<td width="60" align="center" bgcolor="#cccccc"><strong>name</strong></td>
		<td width="44" align="center" bgcolor="#cccccc"><strong>price</strong></td>
		<td width="57" align="center" bgcolor="#cccccc"><strong>view</strong></td>
		</tr>
	<?php include "conect.php";
	      $c_id = @$_GET['c_id'];
		  $str = !empty($c_id)?" where typeid=$c_id":"";
		  $strSQLc = "SELECT * FROM product $str order by p_id desc";
          $objQueryc = $mysqli->query($strSQLc);
		  $numc = mysqli_num_rows($objQueryc);
		  for($i=1;$i<=$numc;$i++)
		  {
			  $objResultc = mysqli_fetch_assoc($objQueryc);
		  ?>
		  <tr>
				<td align="center">
				<?php if (file_exists("img/{$objResultc['p_id']}.jpg"))
			    {
				?>
				<img src="img/<?php echo $objResultc['p_id']?>.jpg" width="80" border="0">
		        <?php
				}
				?>
				<td align="left"><?php echo $objResultc['p_name']?></td>
				<td align="center"><?php echo $objResultc['p_price']?></td>
				<td align="center"><a href="product_detail.php?p_id=<?php echo $objResultc['p_id']?>">view</a></td>
</tr>
<?php
		  }
?>
</table>