<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<table width="90%" align="center" class="square">
    <tr>
        <td colspan="7" align="center"><a href="index.php?page=addsale">ขายของ</td>
    </tr>
    <tr bgcolor="#cccccc">
        <td width="33" align="center"><strong>ลำดับ</strong></td>
        <td width="218" align="center"><strong>เลขใบเสร็จ</strong></td>
        <td width="59" align="center"><strong>วันที่ขาย</strong></td>
        <td width="59" align="center"><strong>พนักงานขาย</strong></td>
    </tr>
    <?php
    include "conect.php";
    $strSQL = "SELECT *
    FROM order
    ORDER BY create_at DESC
    ;";
    $objQuery = $mysqli->query($strSQL);
    $num = mysqli_num_rows($objQuery);
    for ($i = 1; $i <= $num; $i++) {
        $objResult =  mysqli_fetch_assoc($objQuery);
    ?>
        <tr style="text-align: center;">
            <td><?php echo $i ?></td>
            <td>#<?php echo $objResult['order_id'] ?></td>
            <td><?php echo $objResult['create_at'] ?></td>
            <td><?php echo $objResult['order_seller'] ?></td>
    <?php
    }
    ?>
</table>