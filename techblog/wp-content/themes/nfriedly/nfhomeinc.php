<?php

/*
Template Name: nfHomeInc
 */

?>

<div id="blog">

<h1>Latest Articles on the <a href="/techblog">Tech Blog</a></h1>

 <?php

$postnum = 1;

$lastposts = get_posts('numberposts=5');
foreach($lastposts as $post) :

	setup_postdata($post);

	if($postnum == 1):
?>

<div id="latest_post">
	<h1><a href="<?php the_permalink() ?>" ><?php the_title() ?></a></h1>
	<span class="comments-link"><?php comments_popup_link(  'Comments (0)' , 'Comments (1)' , 'Comments (%)' ) ?></span>
	<div class="entry-content">
		 <?php the_excerpt(); ?> <a href="<?php the_permalink() ?>" >(Read more...)</a>
	</div>
</div>

<ul id="recent_posts">

<?php else: ?>

	<li>
		<h1><a href="<?php the_permalink() ?>" ><?php the_title() ?></a></h1>
		<span class="comments-link"><?php comments_popup_link(  'Comments (0)' , 'Comments (1)' , 'Comments (%)' ) ?></span>		
	</li>

<?php 

endif; 

$postnum++;

endforeach; 
 
 ?>

</ul>

<div class="clear"></div>

</div>
