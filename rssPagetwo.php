<?php
require 'autoloader.php';

$feedBBC= new SimplePie();
$feedBBC -> set_feed_url('http://feeds.bbci.co.uk/news/world/rss.xml');
$feedBBC -> init();
$feedBBC -> handle_content_type();
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
    

<!--Create a section to hold the links at the top of the page-->
<div class="links">
<a class="design2" href="rssPageone.php"> CNN News</a>
<a class="design" href="rssPagethree.php"> Aljazera News</a>
</div>

<br><br>
  

<!--This div will hold the title of the page-->  
<div class="feed">

<h1 class="title">
<a href="<?php echo $feedBBC ->get_permalink();?>">
<?php echo $feedBBC ->get_title();?>
</a></h1>
<p class="letter">  <?php echo $feedBBC ->get_description();?> </p>
<br>
</div>


 <!--This div will display news headlines as well as a short description of the story-->
<div class="feed2">
    <h1 class="title" style="text-align:center; font-weight:bold;">Top Stories</h1>
    
<p class="border"></p><br>

<?php
$newsUpdate= $feedBBC -> get_item_quantity(10);

for ($x = 0; $x <= $newsUpdate; $x++):
$news= $feedBBC -> get_item($x);
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
<a class="next" href="rssPagethree.php"> Next Page</a>
</div>
<br><br><br>

