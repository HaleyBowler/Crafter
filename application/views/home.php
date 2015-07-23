<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/jTinder-master/css/jTinder.css"); ?>" />
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Welcome <?php echo $this->session->userdata('username');?></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?=site_url('user/logout')?>">Logout<span class="sr-only">(current)</span></a></li>
					<li class="home"><a href="<?=site_url('like')?>">My Likes<span class="sr-only">(current)</span></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<?php
	$jsonurl = "http://api.pinterest.com/v3/pidgets/users/buzzfeed/pins/";
	$json = file_get_contents($jsonurl);
	$jfo = json_decode($json);

	$pins = $jfo->data->pins;

	$stack = new SplStack();
	foreach ($pins as $pin) {
		$stack->push($pin);
	}
	?>
	<div class="wrap">
		<div id="tinderslide">
			<ul>
				<li> Out of pictures :(</li>
					<?php
					for ($x=sizeof($stack)-1 ; $x >= 0; $x--)
					{
						$pin = $stack->pop();
						$img = $pin->images;
						$description = $pin->description;
						$project = $pin->link;

						$array = json_decode(json_encode($img), true);
						$imgURL = $array["237x"]["url"];
						?>
						<li class="pane2" value="<?php echo $imgURL?>">
							<div class="img" style="background: url(<?php echo $imgURL?>); background-size: 100% 100%" no-repeat scroll center center></div>
							<div id="<?php echo $x?>" description="<?php echo $description?>" image="<?php echo $imgURL?>" link="<?php echo $project?>"><?php echo $description?></div>
							<div class="like"></div>
							<div class="dislike"></div>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
		<!-- jTinder trigger by buttons  -->
		<div class="actions">
			<a href="#" class="dislike"><i></i></a>
			<a href="#" class="like"><i></i></a>
		</div>

	</body>
	<script type="text/javascript" src="<?php echo base_url("assets/jTinder-master/js/jquery.min.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/jTinder-master/js/jquery.transform2d.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/jTinder-master/js/jquery.jTinder.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/jTinder-master/js/main.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.11.3.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<script>
	/*
		var current_project = document.getElementById("current_project");
		var description = current_project.getAttribute("description");
		var imgURL = current_project.getAttribute("image");
		document.getElementById("description").value = description;
		document.getElementById("picture_url").value = imgURL;
	*/
		$("#tinderslide").jTinder({
			onDislike: function (item) {
			},
			onLike: function (item) {
			},
		});
	</script>
	</html>