<?php

get_header(); ?>
<?php if (have_posts()) : 
global $post;
$slug_name = $post->post_name;
while (have_posts()) : the_post(); ?>
<main class="res_disp_main page_<?php echo $slug_name; ?>">
<?php the_content(); ?>
<?php
$itemGroup = SCF::get( 'item-group' );

$listHtml = '<ul class="default_list collection_box js_light_box">';

foreach ( $itemGroup as $field_name => $field_value ) :

	$itemName = esc_html( $field_value['item-name'] );
	$itemImage = esc_html( $field_value['item-image'] );
	$itemPrice = esc_html( $field_value['item-price'] );
	$itemDetails = esc_html( $field_value['item-details'] );
	$itemImgUrl = wp_get_attachment_image_src($itemImage, 'full');

	$listHtml .= '<li class="collection_list">';
	$listHtml .= '<img src="' . $itemImgUrl[0] . '" data_detail="[' . $itemName . '] ' . $itemDetails . ' ' . $itemPrice . '" class="collection">';

	$listHtml .= '</li>';

endforeach; 

$listHtml .= '</ul>';

echo $listHtml;

?>
</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>