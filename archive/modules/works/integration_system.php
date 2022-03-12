<?php
require(DR.'/modules/works/cfg.php');

function worksBBCode($html){
	$html = trim($html[1]);
	$html = str_replace("\t",'&nbsp;&nbsp;&nbsp;',$html);
	$html = str_replace('  ',' &nbsp;',$html);
	$html = preg_replace('/&quot;(.*?)&quot;/', '<span class="quot">&quot;\1&quot;</span>', $html);
	$html = preg_replace('/\'(.*?)\'/', '<span class="quot">\'\1\'</span>', $html);
	$html = str_replace("\n",'<br>', $html);
	$html = specfilter($html);
	return '<pre><code>'.$html.'</code></pre>';
}

function worksFormatText($text){
	$text = preg_replace_callback('#\[code\](.*?)\[/code\]#si', 'worksBBCode', $text);
	$text = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;">\1</span>', $text);
	$text = preg_replace('#\[red\](.*?)\[/red\]#si', '<span style="color: #E53935;">\1</span>', $text);
	$text = '<p>'.str_replace("\n",'</p><p>', trim($text)).'</p>';
	$text = specfilter($text);
	$text = str_replace('<p></p>', '', $text);
	return $text;
}

function worksCategoryName($id){
	global $worksConfig;
	$return = false;
	foreach($worksConfig->cat as $key => $value){
		if ($id == $key){
			$return = $value;
		}
	}
	return $return;
}

function worksCategory($cat, $col, $tpl = false, $tplNoworks = false, $start = false, $sort = 'reverse'){
	global $Config, $Page, $Snippet, $worksStorage, $worksConfig;
	$return = '';
	if($tpl == false){
		$tpl = $worksConfig->blokTemplate;
	}
	if($tplNoworks == false){
		$tplNoworks = '<p>Записей пока нет</p>';
	}
	if($cat){
		$listIdCat = json_decode($worksStorage->get('category'), true);
		$listIdworks = array_keys($listIdCat, $cat);
		
	}else{
		$listIdworks = json_decode($worksStorage->get('list'), true); 
	}
	if($listIdworks == false){
		$return.= $tplNoworks;
	}else{
		if($sort == 'reverse'){
			//перевернули масив для вывода новостей в обратном порядке
			$listIdworks = array_reverse($listIdworks);
		}
		if($sort == 'random'){
			shuffle($listIdworks);
		}
		if(!$start){
			$start = 0;
		}
		for($i = 0 + $start; $i < $col + $start; ++$i){
			if(isset($listIdworks[$i])){
				$worksParam = json_decode($worksStorage->get('works_'.$listIdworks[$i]));
			}else{
				$worksParam = false;
			}
			if ($worksParam != false){
				$categoryname = worksCategoryName($worksParam->cat);
				if(!$categoryname) $categoryname = 'Без категории';
				
				$categoryuri = $worksParam->cat != ''?'/'.$worksConfig->idPage.'/category/'.$worksParam->cat:($Config->indexPage == $worksConfig->idPage?'/':'/'.$worksConfig->idPage);

				$out_prev = str_replace('#header#', $worksParam->header, $tpl);
				$out_prev = str_replace('#content#', $worksParam->prev, $out_prev);
				$out_prev = str_replace('#date#', date($worksConfig->formatDate, isset($worksParam->time)?$worksParam->time:strtotime($worksParam->date)), $out_prev);
				$out_prev = str_replace('#time#', date('H:i', isset($worksParam->time)?$worksParam->time:strtotime($worksParam->date)), $out_prev);
				$out_prev = str_replace('#com#', $worksStorage->iss('count_'.$listIdworks[$i])?$worksStorage->get('count_'.$listIdworks[$i]):0, $out_prev);
				$out_prev = str_replace('#img#', $worksParam->img, $out_prev);
				$out_prev = str_replace('#categoryname#', $categoryname, $out_prev);
				$out_prev = str_replace('#categoryuri#', $categoryuri, $out_prev);
				$out_prev = str_replace('#index#', $i, $out_prev);
				foreach($worksConfig->custom as $value){
					$out_prev = str_replace('#'.$value->id.'#', (isset($worksParam->custom->{$value->id})?$worksParam->custom->{$value->id}:''), $out_prev);
				}
				if(Module::exists('snippets')){
					foreach($Snippet as $key => $value){
						$out_prev = str_replace('#'.$key.'#', $value, $out_prev);
					}
				}
				$return.=  str_replace('#uri#', '/'.$worksConfig->idPage.'/'.$listIdworks[$i], $out_prev);
			}
		}
	}
	return $return;
}
?>