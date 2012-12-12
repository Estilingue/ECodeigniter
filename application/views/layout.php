<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />
	<title><?= $page_title ?></title>
	
	<!-- stylesheets -->
	<? foreach ($stylesheets as $stylesheet): ?>
		<link rel="stylesheet" type="text/css" href="<?=css_asset($stylesheet)?>"/>
	<? endforeach; ?>
	
	<!-- javascripts -->
	<!-- javascripts -->
	<? foreach ($javascripts as $javascript): ?>
		<script type="text/javascript" src="<?=js_asset($javascript)?>"></script>
	<? endforeach; ?>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
</head>

<body>
	<?= $content ?>
</body>
</html>