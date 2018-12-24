<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="日本のジュエリーブランド sangai 公式サイト">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/moving_letters.js"></script>

	<!-- less化 -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
	<title>sangai</title>
    <?php wp_head(); ?>
</head>


<body>
	<?php if(is_front_page()): ?>
	<div id="wrapper" class="top">
	<?php else : ?>
	<div id="wrapper">
	<?php endif;?>
	<header>
		<h1 class="top_title"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="sangai logo"></a></h1>
		<nav class="global_nav">
			<ul class="nav_list">
				<li class="nav_list_content"><a href="<?php echo home_url('/'); ?>about/" class="a_default">ABOUT</a></li>
				<li class="nav_list_content"><a href="<?php echo home_url('/'); ?>news/" class="a_default">NEWS</a></li>
				<li class="nav_list_content"><a href="<?php echo home_url('/'); ?>collection/" class="a_default">COLLECTION</a></li>
				<li class="nav_list_content"><a href="<?php echo home_url('/'); ?>bridal/" class="a_default">BRIDAL</a></li>
				<li class="nav_list_content"><a href="<?php echo home_url('/'); ?>shop/" class="a_default">SHOP</a></li>
				<li class="nav_list_content"><a href="<?php echo home_url('/'); ?>contact/" class="a_default">CONTACT</a></li>
			</ul>
		</nav>
		<button id="menu">MENU</button>
	</header>
