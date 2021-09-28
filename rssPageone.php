<?php
require 'autoloader.php';

$feedCNN= new SimplePie();
$feedCNN -> set_feed_url('http://rss.cnn.com/rss/edition.rss');
$feedCNN -> init();
$feedCNN -> handle_content_type();
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
<!--Create a section for links at the top of the page-->
<div class="links">
<a class="design2" href="rssPagetwo.php"> BBC News</a>
<a class="design" href="rssPagethree.php"> Aljazera News</a>
</div>

<br><br>
  
  <!-- This div is will hold the page title-->
<div class="feed">

<h1 class="title">
<a href="<?php echo $feedCNN ->get_permalink();?>">
<?php echo $feedCNN ->get_title();?>
</a></h1>
<p class="letter">  <?php echo $feedCNN ->get_description();?>  </p>
<br>
</div>

  
<div class="description">
<p> RSS news feed from CNN, BBC and Aljazera are displayed here.<br>
The RSS reader used is simplepie.com and the aim is to diplay the top ten news updates from each of the above sites.<br>
The first page presents CNN news, the second presents BBC news and the last page, Aljazera news.<br> In all there are three pages built to display news feed.
</p>
</div>

  
  
<!--This div will display news headlines as well as a short description of the story-->
<div class="feed2">
    <h1 class="title" style="text-align:center; font-weight:bold;">Top Stories</h1>
    
<p class="border"></p><br>

<?php
$newsUpdate= $feedCNN -> get_item_quantity(10);

for ($x = 0; $x <= $newsUpdate; $x++):
$news= $feedCNN -> get_item($x);
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
<a class="next" href="rssPagetwo.php"> Next Page</a>

<br><br><br>

