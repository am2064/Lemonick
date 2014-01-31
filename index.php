<?php
require_once 'includes/header.php';
?>
<div class="row">
	<div class="large-12 columns">
		<ul class="banner" data-orbit
			data-options="
			bullets: false;
			variable_height: true;
			slide_number: false;
			">
<?php
$big_news = glob("big_news/*.{png,jpg,jpeg,gif}",GLOB_BRACE);
foreach($big_news as $big_new){
	$caption = "big_news/".pathinfo($big_new,PATHINFO_FILENAME).".txt";
?>
<li>
<img class="center" src="<?php echo $big_new; ?>"/>
<?php
	if(file_exists($caption)){
		$caption = file_get_contents($caption);

?>
<div class="orbit-caption">
<?php
		echo $caption;
?>
</div>
<?php
	}
?>
</li>
<?php
}
?>
		</ul>
	</div>
</div>
<p>&nbsp;</p>
<div class="row">
	<div class="medium-2 columns hide-for-portrait">
		<div class="row">
			<div class="panel callout">
<?php
$updates = glob("comics/*/*.{png,jpg,jpeg,gif}",GLOB_BRACE);
array_multisort(
	array_map( 'filemtime', $updates ),
	SORT_NUMERIC,
	SORT_DESC,
	$updates
);

$start = 0;
$stop = 10;
foreach($updates as $update){
	$date = date("m/d/y",filemtime($update));
	$comic = basename(dirname($update));
	$file = pathinfo($update, PATHINFO_FILENAME);
	if($file != 0){

?>
<small><?php echo $date;?> - <a href="comic.php?comic=<?php echo $comic;?>&page=<?php echo $file;?>"><?php echo $comic;?></small></a><br/>
<?php
	}
	if($start++ > $stop) break;
}
?>
			</div>
		</div>
		<div class="row">
			<div class="panel">
				<ul class="no-bullet">
					<li><h3>Ad 1</h3></li>
					<li><h3>Ad 2</h3></li>
					<li><h3>Ad 3</h3></li>
					<li><h3>Ad 4</h3></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="small-12 medium-10 columns">
		<div class="row">
			<div class="large-12 columns">
				<ul class="small-block-grid-1">
<?php
$comics = scandir('comics');
sort($comics);
foreach ($comics as $comic){
	if ($comic === '.' or $comic === '..') continue;
	if (is_dir ('comics/'.$comic)){
		$banner = glob("comics/$comic/0.{png,jpg,jpeg,gif}",GLOB_BRACE);
		if(is_array($banner)){
			$banner = $banner[0];
		}
		if(file_exists($banner)){
			if(is_file($banner)){
?>
<li><a class="th" href="<?php echo 'comic.php?comic='.$comic; ?>"><img  src="<?php echo $banner?>"></a></li>
<?php
			}
		}

		else{
?>
<li><a href="<?php echo 'comic.php?comic='.$comic; ?>" class="large button expand"><?php echo $comic;?></a></li>
<?php
		}
	}
}
?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php
require_once 'includes/footer.php';
?>
