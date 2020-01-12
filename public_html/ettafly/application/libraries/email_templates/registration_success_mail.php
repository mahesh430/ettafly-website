<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
	<link href="<?=base_url()?>web_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="<?=base_url()?>web_assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div style="width: 650px; overflow:hidden; font-family: times; border: 2px solid #333333;">
		<div style="width: 600px; margin:5px 25px; text-align: center;">
			<img src="<?=base_url().$site_settings->logo_image?>" style="margin: 0px auto;"/>
		</div>
		<div style="width: 600px; margin:5px 25px; text-align: center;">
			<em><b>Thanks for registering.<br/> Please login using following details.</b></em>
		</div>
		<div style="width: 150px; float:left; margin-left: 25px;">
			<div style="width: 150px; padding: 3px 10px;">
				<b>Full Name :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Mobile Number :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Email :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Password :</b>
			</div>
		</div>
		<div style="width: 450px; float:right; margin-right: 25px;">
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->full_name?>
			</div>
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->mobile?>
			</div>
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->email?>
			</div>
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->password?>
			</div>
		</div>
		<div style="width: 600px; margin:5px 25px; text-align: center;">
			<em>Copyright &copy;<?=date('Y')?> perfectmentors.in. All Rights Reserved</em>
		</div>
	</div>
</body>
</html>