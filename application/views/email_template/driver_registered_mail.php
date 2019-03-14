<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Registered Driver | Conrads Fine Dryclean</title>

</head>



<body>

<table bgcolor="#fcfcfc" class="emailer" cellpadding="8" cellspacing="0" width="600" style="border:1px solid #ccc; margin:0 auto; padding:0px;">

	<thead>

    	<tr>

        	<th colspan="2">

            	<a href="<?php //echo $admin_data['web_link']; ?>" target="_blank">

                    <img src="<?php echo $admin_data['image']; ?>" alt="" width= "50"/>

                </a><br/>

                <!-- <span><a href="<?php echo $admin_data['web_link']; ?>" target="_blank" style="color:#222;"><?php echo $admin_data['web_link']; ?></a></span> -->

            </th>

        </tr>

        <tr>

        	<th colspan="2">

            	<h2 style="padding:0px; margin:0px;">User Info</h2>

            </th>

        </tr>

        <tr>

        	<th colspan="2">

            	<h4 style="padding:0px; margin:0px;">User Details</h4>

            </th>

        </tr>

    </thead>

    <tbody>

    	<tr bgcolor="#ffeaff">

        	<td width="50%" align="right">Driver Name :</td>

            <td width="50%" align="left" style="color:red"><?php echo $res_user['name']; ?></td>

        </tr>

        <tr>

        	<td width="50%" align="right">Email :</td>

            <td width="50%" align="left"><?php echo $res_user['email']; ?></td>

        </tr>

        <tr bgcolor="#001b61" align="center">

        	<td colspan="2" style="color:#fff;">&copy;2018| All Rights Reserved<br/><!-- <a href="<?php echo $admin_data['web_link']; ?>" target="_blank" style="color:#fff;"><?php echo $admin_data['web_link']; ?></a> --></td>

        </tr>

        

	</tbody>

</table>







</body>

</html>