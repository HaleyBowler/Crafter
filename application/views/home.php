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
		$pin = $pins{0};
		$img = $pin->images;
		$description = $pin->description;
		$project = $pin->link;
		$array = json_decode(json_encode($img), true);
		$imgURL = $array["237x"]["url"];
		?>
	    <img src="<?php echo $imgURL?>">
	    <form action="insert_into_db" method="post">
				<input type="hidden" id="description" name="description" value="<?php echo $description?>" />
				<input type="hidden" id="project_url" name="project_url" value="<?php echo $project?>" />
				<input type="hidden" id="picture_url" name="picture_url" value="<?php echo $imgURL?>" />
				<input type="hidden" id="user_id" name="user_id" value="1" />
			</div>
			<button type="submit">Like</button>
		</form>
		<button>Dislike</button>
		<?php
		/*
		foreach ($pins as $pin) {
			$img = $pin->images;
			$description = $pin->description;
			$project = $pin->link;
			$array = json_decode(json_encode($img), true);
			$imgURL = $array["237x"]["url"];
		}
		*/
		?>

		<?php
		//$img = 'assets/file.jpg';
		//file_put_contents($img, file_get_contents($url));
		//echo '<img src="assets/file.jpg">';
		?>
	</div>
</body>
</html>