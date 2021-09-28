<?php
require 'autoloader.php';

$feedAljazera= new SimplePie();
$feedAljazera -> set_feed_url('https://www.aljazeera.com/xml/rss/all.xml');
$feedAljazera -> init();
$feedAljazera -> handle_content_type();
?>
<!DOCTYPE html>
<html>
<head>
<title> RSS Feed</title>
<link rel="stylesheet" href="rss_feed.css">
<link rel="stylesheet" type="text/css" media="(max-width:330px)" href="rss_feed330px.css">
<link rel="stylesheet" type="text/css" media="(max-width:650px)" href="rss_feed650px.css">
<link rel="stylesheet" type="text/css" media="(max-width:990px)" href="rss_feed990px.css">

</head>

<body>
    
<div class="links">
<a class="design2" href="rssPageone.php"> CNN News</a>
<a class="design" href="rssPagetwo.php"> BBC News</a>
</div>

<br><br>
<div class="feed">

<h1 class="title">
<a href="<?php echo $feedAljazera ->get_permalink();?>">
<?php echo $feedAljazera ->get_title();?>
</a></h1>
<p class="letter">  <?php echo $feedAljazera ->get_description();?> </p>
<br>
</div>


<div class="feed2">
    <h1 class="title" style="text-align:center; font-weight:bold;">Top Stories</h1>
    
<p class="border"></p><br>

<?php
$newsUpdate= $feedAljazera -> get_item_quantity(10);

for ($x = 0; $x <= $newsUpdate; $x++):
$news= $feedAljazera -> get_item($x);
?>



<h2 class="title">
<a href="<?php echo $news -> get_permalink(); ?>">
<?php echo $news -> get_title(); ?>
</a></h2>

<p class="letter"><?php echo $news -> get_description(); ?></p>
<p><small> 
Posted on <?php echo $news -> get_date('j F Y | g: i: a'); ?>
</small></p>
<p class="border"></p><br>

<?php endfor; ?>

</div>
<br><br>
<a class="next" href="rssPageone.php"> Next Page</a>
</div>
<br><br><br>

