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
			<em><b>Dear <?=$result->name?>,<br/></b> &emsp; We Received your contact enquiry. We will getback soon.</em>
		</div>
		<div style="width: 600px; margin:5px 25px; text-align: center;">
			<em>Copyright &copy;<?=date('Y')?> <?=SITE_URL?>. All Rights Reserved</em>
		</div>
	</div>
</body>
</html>