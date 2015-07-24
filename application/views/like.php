<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
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
				<a class="navbar-brand" href="#">My likes!</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?=site_url('user/logout')?>">Logout<span class="sr-only">(current)</span></a></li>
					<li class="home"><a href="<?=site_url('user/login')?>">Home<span class="sr-only">(current)</span></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row">
			<?php foreach ($likes as $like)
			{   
				?>
				<div class="col-sm-4 pad-bottom">
					<a href= "<?php echo $like['project_url']?>">
						<p class="center">
							<img src="<?php echo $like['picture_url']?>" class="liked-pic" width:"200" height="250">
						</p>
					</a>
				</div>
				<?php 
			} 
			?>
		</div>
	</div>
	<!--<p class="center"><?php echo $pagination; ?></p>-->
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.11.3.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>