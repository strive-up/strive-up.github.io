<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<?php $page->get_headhtml();?>
<title><?php $page->get_title();?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="<?php $page->get_description();?>">
<meta name="keywords" content="<?php $page->get_keywords();?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=cyrillic" rel="stylesheet">
<style type="text/css"><?php require('style.min.css');?></style>
<link rel="icon" href="https://sps-expert.com/favicon.ico" type="image/x-icon">
</head>
<body>

	<div class="container">
		<header>
			<h1><a href="/"><?php $page->get_header();?></a></h1>
			<div class="slogan"><?php $page->get_slogan();?></div>
			
			<div class="hbr_menu">
				<a href="javascript:void(0);" id="menu" class="button">Меню</a>
			</div>

			<nav id="nav">
				<?php $page->get_menu('span');?>
			</nav>

		</header>
	</div>

<div class="container">
	<div class="board"><img src="/modules/deftpl/images/t.jpg" alt=""></div>
</div>

<div class="container">
	<div class="content">
		<div id="sidebar_menu" class="sidebar sidebar_left">
			<?php $page->get_column('left','<aside><h2>#name#</h2><div class="aside_content">#content#</div></aside>');?>
		</div>
		<main>
			<article>
				<h1 class="name"><?php $page->get_name();?></h1>
				<?php $page->get_content();?>
			</article>
		</main>
	</div>
</div>

<div class="bgfooter">
	<div class="container">
		<footer>
			<a href="/" class="logo"><?php $page->get_header();?></a>
                <div class="nav">
                    <span><a href="https://sps-expert.com/">Общество с ограниченной ответственностью "СПС-Экспертиза" © 2021</a></span>
                </div>
		</footer>
	</div>
</div>

<!-- Page script -->
<script>
document.getElementById('menu').onclick = function(){
	var menu = document.getElementById('nav');
	var sidebar_menu = document.getElementById('sidebar_menu');
	if(menu.style.height == menu.scrollHeight + 'px'){
		menu.style.height = '0px';
		sidebar_menu.style.height = '0px';
	}else{
		menu.style.height = menu.scrollHeight + 'px';
		sidebar_menu.style.height = sidebar_menu.scrollHeight + 'px';
	}
}
</script>
<?php $page->get_endhtml();?>
</body>
</html>