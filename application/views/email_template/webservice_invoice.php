<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Booking Invoice | Zoom Care Spa</title>
</head>

<body>
<table bgcolor="#fcfcfc" class="emailer" cellpadding="8" cellspacing="0" width="600" style="border:1px solid #ccc; margin:0 auto; padding:0px;">
	<thead>
    	<tr>
        	<th colspan="2">
            	<a href="<?php echo $admin_data['web_link']; ?>" target="_blank">
                    <img src="<?php echo $admin_data['image']; ?>" alt="" width= "50"/>
                </a><br/>
                <span><a href="<?php echo $admin_data['web_link']; ?>" target="_blank" style="color:#222;"><?php echo $admin_data['web_link']; ?></a></span>
            </th>
        </tr>
        <tr>
        	<th colspan="2">
            	<h2 style="padding:0px; margin:0px;">Booking Invoice</h2>
            </th>
        </tr>
        <tr>
        	<th colspan="2">
            	<h4 style="padding:0px; margin:0px;">Service Details</h4>
            </th>
        </tr>
    </thead>
    <tbody>
    	<tr bgcolor="#ffeaff">
        	<td width="50%" align="right">Price Type :</td>
            <td width="50%" align="left" style="color:red"><?php echo str_replace("_"," ",$data->price_type); ?></td>
        </tr>
        <tr>
        	<td width="50%" align="right">Total Hour Price :</td>
            <td width="50%" align="left"><?php echo $data->total_hour_price; ?></td>
        </tr>
        <tr bgcolor="#ffeaff">
        	<td width="50%" align="right">Total with Base price :</td>
            <td width="50%" align="left"><?php echo $data->total_with_base_price; ?></td>
        </tr>
        <tr>
        	<td width="50%" align="right">Serice Fees Percentage :</td>
            <td width="50%" align="left"><?php echo $data->ptg_service_fees; ?></td>
        </tr>
        <tr bgcolor="#ffeaff">
        	<td width="50%" align="right">Tax:</td>
            <td width="50%" align="left"><?php echo $data->ptg_tax; ?></td>
        </tr>
        <tr>
        	<td width="50%" align="right">Coupon :</td>
            <td width="50%" align="left"><?php echo $data->coupon; ?></td>
        </tr>
        <tr bgcolor="#ffeaff">
        	<td width="50%" align="right">Total Amount :</td>
            <td width="50%" align="left"><?php echo $data->total_amount; ?></td>
        </tr>
        <tr bgcolor="#001b61" align="center">
        	<td colspan="2" style="color:#fff;">&copy;2018| All Rights Reserved<br/><a href="<?php echo $admin_data['web_link']; ?>" target="_blank" style="color:#fff;"><?php echo $admin_data['web_link']; ?></a></td>
        </tr>
        
	</tbody>
</table>



</body>
</html>