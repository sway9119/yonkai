<?php
/**
 * Template Name: shop
 */ 
get_header(); ?>
<?php if (have_posts()) : 
global $post;
$slug_name = $post->post_name;
while (have_posts()) : the_post(); ?>
<main class="res_disp_main page_<?php echo $slug_name; ?>">
<?php the_content(); ?>
<?php
$shop_group = SCF::get( 'shop-info-group' );
$counter = 0;

$html = '<div class="l_info l_shop res_flex">';
$boxRight = '<ul class="default_list">';
$boxLeft = '<ul class="default_list res_flex">';
$boxEnd = '</ul>';

foreach ( $shop_group as $field_name => $field_value ) :

	$shopName = esc_html( $field_value['shop-name'] );
	$shopAddress = esc_html( $field_value['shop-address'] );
	$shopTel = esc_html( $field_value['shop-tel'] );
	$shopUrl = esc_html( $field_value['shop-url'] );
	$shopImg = $field_value['shop-img'];

	$listHtml = "<li>";
	$listHtml .= '<h2 class="shop-info-name">' . $shopName . '</h2>';
	if (!empty($shopAddress)):
		$listHtml .=  '<span class="shop-info-address">' . $shopAddress . '</span>';
	endif;

	// 未使用
	if (!empty($shopImg)) {
		$shopImg = wp_get_attachment_image($shopImg, 'full');
		$listHtml .= $shopImg;
	}

	if (!empty($shopTel)):
		$listHtml .=  '<span class="shop-info-tel">' . $shopTel . '</span>';
	endif;
	if (!empty($shopUrl)):
		$listHtml .=  '<a class="shop-info-url" href="' . $shopUrl . '" target="_blank">' . $shopUrl . '</a>';
	endif;
	$listHtml .= "</li>";

	if($counter % 2 === 0) :
		$boxRight .= $listHtml;
	else : 
		$boxLeft .= $listHtml;
	endif;
	$counter++;

endforeach; 
$boxRight .= $boxEnd;
$boxLeft .= $boxEnd;
$html .= $boxRight . $boxLeft . '</div>';

echo $html;

?>
</main>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>