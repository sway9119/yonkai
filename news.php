<?php
/**
 * Template Name: news
 */ 
 ?>
<?php get_header(); ?>
<?php
global $post;
$slug_name = $post->post_name;
$paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
$args = array(
'post_type' => 'post',
'posts_per_page' => 10,
'paged' => $paged
);

$the_query = new WP_Query($args);
            
?> 
<?php
$html = '<div class="l_news l_info"><ul class="default_list">';
if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post();

$html .= '<li class="news_list">';
$html .= '<div class="news_text">';
$html .= '<div class="news_content">';
$html .= '<h3>' . get_the_title() . '</h3>';
$html .= '<span class="news_date">' . get_the_date() . '</span>';
$html .= get_the_content();
$html .= '</div>';
$html .= '</div>';
if (!empty(get_the_post_thumbnail($the_query->ID,'full', array('class' => 'news_img')))) :
	$html .= '<div class="news_img_box">';
	$html .= get_the_post_thumbnail($the_query->ID,'full', array('class' => 'news_img'));
	$html .= '</div>';
endif;
$html .= '</li>';

endwhile;
$html .= '</div></ul>';
?>
<main class="res_disp_main page_<?php echo $slug_name; ?>">
	<?php echo $html; ?>
</main>
<?php endif; ?>
<?php get_footer();?>