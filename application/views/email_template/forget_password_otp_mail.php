<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>OTP For Forget Password Request | Conrads Fine Dryclean</title>

</head>



<body>

<table bgcolor="#fcfcfc" class="emailer" cellpadding="8" cellspacing="0" width="600" style="border:1px solid #ccc; margin:0 auto; padding:0px;">

	<thead>
    	<tr>
        	<th colspan="2">
            	<a href="<?php //echo $admin_data['web_link']; ?>" target="_blank">
                    <img src="<?php echo $details['logo']; ?>" alt="" width= "50"/>
                </a>
            </th>
        </tr>
    </thead>

    <tbody>
    	<tr bgcolor="#ffeaff">
        	<td width="50%" align="right">Name :</td>
            <td width="50%" align="left" style="color:red"><?php echo $details['name']; ?></td>
        </tr>

        <tr>
        	<td width="50%" align="right">Email :</td>
            <td width="50%" align="left"><?php echo $details['email']; ?></td>
        </tr>

         <tr>
            <td width="50%" align="right">OTP :</td>
            <td width="50%" align="left"><?php echo $details['otp']; ?></td>
        </tr>

        <tr>
            <td width="50%" align="right">Reset Link :</td>
            <td width="50%" align="left"><a href="<?php echo $details['reset_link']; ?>" target="_blank"> Click Here </a></td>    
        </tr>

        <tr bgcolor="#001b61" align="center">
        	<td colspan="2" style="color:#fff;">&copy;2018| All Rights Reserved<br/><!-- <a href="<?php echo $admin_data['web_link']; ?>" target="_blank" style="color:#fff;"><?php echo $admin_data['web_link']; ?></a> --></td>
        </tr>

	</tbody>
</table>







</body>

</html>