<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div>
		<a href="<?=site_url('user/logout')?>" style="float: right;">logout</a>
	</div>
	<div>
		<?php echo "Welcome ".$this->session->userdata('username');?>
	</div>
	<div>
		<?php
		$jsonurl = "http://api.pinterest.com/v3/pidgets/users/pagingfunmums/pins/";
		$json = file_get_contents($jsonurl);
		$jfo = json_decode($json);
		$pins = $jfo->data->pins;
		foreach ($pins as $pin) {
			$img = $pin->images;
			$array = json_decode(json_encode($img), true);
			$imgURL = $array["237x"]["url"];
			?>
			<img src="<?php echo $imgURL?>">
			<?php
		}
		?>

		<?php
		//$img = 'assets/file.jpg';
		//file_put_contents($img, file_get_contents($url));
		//echo '<img src="assets/file.jpg">';
		?>
	</div>
</body>
</html>