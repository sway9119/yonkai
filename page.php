<?php get_header(); ?>
<?php if (have_posts()) : 
	global $post;
	$slug_name = $post->post_name;
while (have_posts()) : the_post(); ?>
<main class="res_disp_main page_<?php echo $slug_name; ?>">
<?php the_content(); ?>
</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>