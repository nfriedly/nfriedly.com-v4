<?php get_header();
	get_sidebar();
 ?>

    <div id="content">

		<?php if(!is_front_page()): ?>
		<p class="navigation">
			<div class="left"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="right"><?php next_post_link('%link &raquo;') ?></div>
		</p>
		<div class="clear"></div>
		<?php endif; ?>

<?php while ( have_posts() ) : the_post();

// check if I need to include the lightbox scripts in the footer
if(get_post_meta($post->ID, 'lightbox', true)){
	$GLOBALS['nf_include_lightbox'] = true;
}

?>

			<div class="post">
				<h1 class="entry-title"><a href="<?php the_permalink() ?>" ><?php the_title() ?></a></h1>
				<small class="date"><?php the_time('F jS, Y'); ?> 
				By <?=get_the_author()?> 
<?php /* <a href="<?=get_author_link( false, $authordata->ID, $authordata->user_nicename )?>"> </a> */ ?>
				<?php edit_post_link('Edit',' | ',''); ?>  
				</small>

				<div class="entry-content">
					<?php the_content(); ?>

					<?php if(0 && !is_front_page()): ?>
						<script type="text/javascript"><!--
						google_ad_client = "pub-9477050254721722";
						/* nfriedly techblog semi-wide */
						google_ad_slot = "6866419683";
						google_ad_width = 468;
						google_ad_height = 60;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
						
						<script type="text/javascript"><!--
						google_ad_client = "pub-9477050254721722";
						/* nfriedly techblog semi-wide links */
						google_ad_slot = "0575527184";
						google_ad_width = 468;
						google_ad_height = 15;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
					<?php endif; ?>

				</div>
				<div class="entry-meta">

					<span class="comments-link"><?php comments_popup_link( __( 'Comments (0)' ), __( 'Comments (1)' ), __( 'Comments (%)' ) ) ?></span>

					<?php the_tags('<span class="tag-links">Tagged ', ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\"></span>\n" ) ?>
					<?php edit_post_link('Edit',' | ',''); ?>  
				</div>
			</div><!-- .post -->
			

<?php comments_template() ?>

<?php endwhile; ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&laquo;</span> Older posts' ) ?></div>
				<div class="nav-next"><?php previous_posts_link( 'Newer posts <span class="meta-nav">&raquo;</span>' ) ?></div>
			</div>

<hr />

		<p>
<a class="right" href="http://nfriedly.com/techblog/feed/"><img src="/img/feed-icon-14x14.png" alt="RSS" /></a>
<a href="/webdev">nFriedly Web Development</a>  &raquo; <a href="/techblog">Technical Blog</a></p>
		
		

<?php get_footer() ?>