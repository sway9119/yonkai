<?php
/**
 * Template Name: collection
 */ 
get_header(); ?>

<?php
global $post;
$slug_name = $post->post_name;
$html = '<ul class="default_list">';
$counter = 0;
$args = array(
'post_type' => 'collection',
'posts_per_page' => -1,
'order' => 'ASC',
'orderby' => 'title'
);
?>

<main class="res_disp_main page_<?php echo $slug_name; ?>">
<div class="l_center l_collection">
<?php
$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) :
	while($the_query->have_posts()) :
	$counter++;
	$the_query->the_post();
	$html .= '<li class="list_item">';
	$html .= '<a href="' . get_the_permalink() . '" class="a_default">';
	$html .= $counter;
	$html .= '</a>';
	$html .= '</li>';
	
	endwhile;
$html .= '</ul>';
echo $html;
endif; ?>
</div>
</main>
<?php get_footer();?>