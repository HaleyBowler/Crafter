<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/jTinder-master/css/jTinder.css"); ?>" />
</head>
<body>
	<!--<div>
		<a href="<?=site_url('user/logout')?>" style="float: right;">Logout</a><br/>
		<a href="<?=site_url('like')?>" style="float: right;">My Likes</a>
	</div>
	<div>-->
		<?php echo "Welcome ".$this->session->userdata('username');?>
	</div>
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
		    		for ($x=0 ; $x <= sizeof($stack); $x++)
		    		{
		    			$pin = $stack->pop();
						$img = $pin->images;
						$description = $pin->description;
						$project = $pin->link;

						$array = json_decode(json_encode($img), true);
						$imgURL = $array["237x"]["url"];
				?>
				<li class="pane2">
					<div class="img" style="background: url(<?php echo $imgURL?>); background-size: 100% 100%" no-repeat scroll center center></div>
					<div id="current_project" description="<?php echo $description?>" image="<?php echo $imgURL?>" link="<?php echo $project?>"><?php echo $description?></div>
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
    <script>$("#tinderslide").jTinder();</script>
</html>