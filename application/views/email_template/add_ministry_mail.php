<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Ministry</title>
</head>
<body>
<table bgcolor="#fcfcfc" class="emailer" cellpadding="8" cellspacing="0" width="600" style="border:1px solid #ccc; margin:0 auto; padding:0px;">
    <thead>
        <tr>
            <th colspan="2">
                <a href="<?php //echo $admin_data['web_link']; ?>" target="_blank">
                    <img src="http://googlyexpert.com/wakachurch/uploads/settings/logo.png" alt="" width= "100%"/>
                </a><br/>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <h2 style="padding:0px; margin:0px;">Hi, <?php echo isset($res_user) ? $res_user :''; ?> .</h2>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <h4 style="padding:0px; margin:0px;">Click on the link to go to Add Ministry page</h4>
                <p><?php echo $bodymessage; ?></p>
            </th>
        </tr>
	<tr>
        
        </tr>
    </thead>
    <tbody>
        
        
        <tr bgcolor="#001b61" align="center">
            <td colspan="2" style="color:#fff;">&copy;2019 Wakachurch| All Rights Reserved<br/><!-- <a href="<?php echo $admin_data['web_link']; ?>" target="_blank" style="color:#fff;"><?php echo $admin_data['web_link']; ?></a> --></td>
        </tr>
    </tbody>
</table>
</body>
</html>