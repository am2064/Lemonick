<?php
require_once 'includes/header.php';
if(isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page = 1;
}
$latest = glob("comics/{$_GET["comic"]}/*.{png,jpg,jpeg,gif}",GLOB_BRACE);
$latest = pathinfo(max($latest), PATHINFO_FILENAME);
$image = glob("comics/{$_GET["comic"]}/$page.{png,jpg,jpeg,gif}",GLOB_BRACE);
if(is_array($image)){
	$image = $image[0];
}
?>
<div class="row">
<?php
if(is_file($image)){
?>
<img src="<?php echo $image; ?>">
<?php
}else{
?>
<div class="panel">
	<h1>Sorry!</h1>
	<p>This Page Does Not Exist</p>
</div>
<?php
}
?>
</div>
<div class="row">
	<div class="small-10 medium-6 large-5 columns small-centered">
		<ul class="button-group [radius round]">
			<li><a <?php if($page!=1){ ?> href="<?php echo "comic.php?comic={$_GET["comic"]}&page=1"; ?>" <?php } ?> class="button <?php if ($page==1){echo "disabled";} ?>"> << </a></li>
			<li><a <?php if($page!=1){ ?> href="<?php echo "comic.php?comic={$_GET["comic"]}&page=".($page - 1); ?>" <?php } ?> class="button <?php if ($page==1){ echo "disabled"; } ?>"> < </a></li>
			<li><a href="<?php echo "comic.php?comic={$_GET["comic"]}&page=".($page + 1); ?>" class="button"> > </a></li>
			<li><a <?php if(isset($latest)){ ?> href="<?php echo "comic.php?comic={$_GET["comic"]}&page=$latest"; ?>" <?php } ?> class="button <?php if(!isset($latest)){ echo "disabled"; } ?>"> >> </a></li>
		</ul>
	</div>
</div>
<?php
require_once 'includes/footer.php';
?>
