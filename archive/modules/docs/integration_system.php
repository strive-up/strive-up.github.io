<?php
require(DR.'/modules/docs/cfg.php');

function docsBBCode($html){
	$html = trim($html[1]);
	$html = str_replace("\t",'&nbsp;&nbsp;&nbsp;',$html);
	$html = str_replace('  ',' &nbsp;',$html);
	$html = preg_replace('/&quot;(.*?)&quot;/', '<span class="quot">&quot;\1&quot;</span>', $html);
	$html = preg_replace('/\'(.*?)\'/', '<span class="quot">\'\1\'</span>', $html);
	$html = str_replace("\n",'<br>', $html);
	$html = specfilter($html);
	return '<pre><code>'.$html.'</code></pre>';
}

function docsFormatText($text){
	$text = preg_replace_callback('#\[code\](.*?)\[/code\]#si', 'docsBBCode', $text);
	$text = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;">\1</span>', $text);
	$text = preg_replace('#\[red\](.*?)\[/red\]#si', '<span style="color: #E53935;">\1</span>', $text);
	$text = '<p>'.str_replace("\n",'</p><p>', trim($text)).'</p>';
	$text = specfilter($text);
	$text = str_replace('<p></p>', '', $text);
	return $text;
}

function docsCategoryName($id){
	global $docsConfig;
	$return = false;
	foreach($docsConfig->cat as $key => $value){
		if ($id == $key){
			$return = $value;
		}
	}
	return $return;
}

function docsCategory($cat, $col, $tpl = false, $tplNodocs = false, $start = false, $sort = 'reverse'){
	global $Config, $Page, $Snippet, $docsStorage, $docsConfig;
	$return = '';
	if($tpl == false){
		$tpl = $docsConfig->blokTemplate;
	}
	if($tplNodocs == false){
		$tplNodocs = '<p>Записей пока нет</p>';
	}
	if($cat){
		$listIdCat = json_decode($docsStorage->get('category'), true);
		$listIddocs = array_keys($listIdCat, $cat);
		
	}else{
		$listIddocs = json_decode($docsStorage->get('list'), true); 
	}
	if($listIddocs == false){
		$return.= $tplNodocs;
	}else{
		if($sort == 'reverse'){
			//перевернули масив для вывода новостей в обратном порядке
			$listIddocs = array_reverse($listIddocs);
		}
		if($sort == 'random'){
			shuffle($listIddocs);
		}
		if(!$start){
			$start = 0;
		}
		for($i = 0 + $start; $i < $col + $start; ++$i){
			if(isset($listIddocs[$i])){
				$docsParam = json_decode($docsStorage->get('docs_'.$listIddocs[$i]));
			}else{
				$docsParam = false;
			}
			if ($docsParam != false){
				$categoryname = docsCategoryName($docsParam->cat);
				if(!$categoryname) $categoryname = 'Без категории';
				
				$categoryuri = $docsParam->cat != ''?'/'.$docsConfig->idPage.'/category/'.$docsParam->cat:($Config->indexPage == $docsConfig->idPage?'/':'/'.$docsConfig->idPage);

				$out_prev = str_replace('#header#', $docsParam->header, $tpl);
				$out_prev = str_replace('#content#', $docsParam->prev, $out_prev);
				$out_prev = str_replace('#date#', date($docsConfig->formatDate, isset($docsParam->time)?$docsParam->time:strtotime($docsParam->date)), $out_prev);
				$out_prev = str_replace('#time#', date('H:i', isset($docsParam->time)?$docsParam->time:strtotime($docsParam->date)), $out_prev);
				$out_prev = str_replace('#com#', $docsStorage->iss('count_'.$listIddocs[$i])?$docsStorage->get('count_'.$listIddocs[$i]):0, $out_prev);
				$out_prev = str_replace('#img#', $docsParam->img, $out_prev);
				$out_prev = str_replace('#categoryname#', $categoryname, $out_prev);
				$out_prev = str_replace('#categoryuri#', $categoryuri, $out_prev);
				$out_prev = str_replace('#index#', $i, $out_prev);
				foreach($docsConfig->custom as $value){
					$out_prev = str_replace('#'.$value->id.'#', (isset($docsParam->custom->{$value->id})?$docsParam->custom->{$value->id}:''), $out_prev);
				}
				if(Module::exists('snippets')){
					foreach($Snippet as $key => $value){
						$out_prev = str_replace('#'.$key.'#', $value, $out_prev);
					}
				}
				$return.=  str_replace('#uri#', '/'.$docsConfig->idPage.'/'.$listIddocs[$i], $out_prev);
			}
		}
	}
	return $return;
}
?>