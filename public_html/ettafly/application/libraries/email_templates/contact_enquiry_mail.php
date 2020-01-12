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
		<div style="width: 600px; margin:5px 25px; text-align: justify;">
			<em><b>Hello Admin,<br/> &emsp; Received new contact enquiry. Please find below details.</b></em>
		</div>
		<div style="width: 150px; float:left; margin-left: 25px;">
			<div style="width: 150px; padding: 3px 10px;">
				<b>Name :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Email :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Subject :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Phone Number :</b>
			</div>
			<div style="width: 150px; padding: 3px 10px;">
				<b>Message :</b>
			</div>
		</div>
		<div style="width: 450px; float:right; margin-right: 25px;">
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->name?>
			</div>
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->email?>
			</div>
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->subject?>
			</div>
			<div st
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->phone?>
			</div>
			
			<div style="width: 450px; padding: 3px 10px;">
				<?=$result->user_message?>
			</div>
		</div>
		<div style="width: 600px; margin:5px 25px; text-align: center;">
			<em>Copyright &copy;<?=date('Y')?> <?=SITE_URL?>. All Rights Reserved</em>
		</div>
	</div>
</body>
</html>