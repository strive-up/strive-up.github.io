<?php
if (!class_exists('System')) exit; // Запрет прямого доступа
if (!isset($Config)) global $Config; 

$sitemapStorage = new EngineStorage('module.sitemap');

if (Module::exists('news')) {
    require(DR.'/modules/news/cfg.php');
    if(!isset($newsConfig->idPage)) $newsConfig->idPage = 'news';
}

	if (Module::exists('works')) {
		require(DR.'/modules/works/cfg.php');
		if(!isset($worksConfig->idPage)) $worksConfig->idPage = 'works';
	}

	if (Module::exists('expert')) {
		require(DR.'/modules/expert/cfg.php');
		if(!isset($expertConfig->idPage)) $expertConfig->idPage = 'expert';
	}

	if (Module::exists('tidings')) {
		require(DR.'/modules/tidings/cfg.php');
		if(!isset($expertConfig->idPage)) $expertConfig->idPage = 'tidings';
	}

// Вывод карты сайта если обратились по site.ru/sitemap.xml
if(preg_match ('/^\/sitemap\.xml(\?.*)?$/', REQUEST_URI)){
    $listPages = System::listPages();

    $genSitemap = false;
    if ($sitemapStorage->iss('sitemap')){
        if ($sitemapStorage->time('sitemap') + 86400 < time()){
            $genSitemap = true;
        }
    }else{
        $genSitemap = true;
    }

    header('Content-Type: text/xml; charset=utf-8');
    if($genSitemap){
        $inner = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $inner.= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        foreach($listPages as $value){
			$inner.= '<url><loc>'.$Config->protocol.'://'.SERVER.'/'.str_replace($Config->indexPage, '', $value).'</loc></url>'."\n";
        }
        if(Module::exists('news')){
            if(($listIdNews = json_decode($newsStorage->get('list'), true)) != false){
                foreach($listIdNews as $value){
                    $inner.= '<url><loc>'.$Config->protocol.'://'.SERVER.'/'.$newsConfig->idPage.'/'.$value.'</loc></url>'."\n";
                }
            }
        }

			if(Module::exists('works')){
				if(($listIdworks = json_decode($worksStorage->get('list'), true)) != false){
					foreach($listIdworks as $value){
						$inner.= '<url><loc>'.$Config->protocol.'://'.SERVER.'/'.$worksConfig->idPage.'/'.$value.'</loc></url>'."\n";
					}
				}
			}

			if(Module::exists('expert')){
				if(($listIdexpert = json_decode($expertStorage->get('list'), true)) != false){
					foreach($listIdexpert as $value){
						$inner.= '<url><loc>'.$Config->protocol.'://'.SERVER.'/'.$expertConfig->idPage.'/'.$value.'</loc></url>'."\n";
					}
				}
			}

			if(Module::exists('tidings')){
				if(($listIdtidings = json_decode($tidingsStorage->get('list'), true)) != false){
					foreach($listIdtidings as $value){
						$inner.= '<url><loc>'.$Config->protocol.'://'.SERVER.'/'.$tidingsConfig->idPage.'/'.$value.'</loc></url>'."\n";
					}
				}
			}

        $inner.= '</urlset>';
        $sitemapStorage->set('sitemap', $inner); // записали кеш
        echo $inner; // вывели кеш
    }else{
        echo $sitemapStorage->get('sitemap'); // вывели кеш
    }

    ob_end_flush(); exit;
}
?>