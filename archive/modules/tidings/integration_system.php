<?php
require(DR.'/modules/tidings/cfg.php');

function tidingsBBCode($html){
	$html = trim($html[1]);
	$html = str_replace("\t",'&nbsp;&nbsp;&nbsp;',$html);
	$html = str_replace('  ',' &nbsp;',$html);
	$html = preg_replace('/&quot;(.*?)&quot;/', '<span class="quot">&quot;\1&quot;</span>', $html);
	$html = preg_replace('/\'(.*?)\'/', '<span class="quot">\'\1\'</span>', $html);
	$html = str_replace("\n",'<br>', $html);
	$html = specfilter($html);
	return '<pre><code>'.$html.'</code></pre>';
}

function tidingsFormatText($text){
	$text = preg_replace_callback('#\[code\](.*?)\[/code\]#si', 'tidingsBBCode', $text);
	$text = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;">\1</span>', $text);
	$text = preg_replace('#\[red\](.*?)\[/red\]#si', '<span style="color: #E53935;">\1</span>', $text);
	$text = '<p>'.str_replace("\n",'</p><p>', trim($text)).'</p>';
	$text = specfilter($text);
	$text = str_replace('<p></p>', '', $text);
	return $text;
}

function tidingsCategoryName($id){
	global $tidingsConfig;
	$return = false;
	foreach($tidingsConfig->cat as $key => $value){
		if ($id == $key){
			$return = $value;
		}
	}
	return $return;
}

function tidingsCategory($cat, $col, $tpl = false, $tplNotidings = false, $start = false, $sort = 'reverse'){
	global $Config, $Page, $tidingsStorage, $tidingsConfig;
	$return = '';
	if($tpl == false){
		$tpl = $tidingsConfig->blokTemplate;
	}
	if($tplNotidings == false){
		$tplNotidings = '<p>Записей пока нет</p>';
	}
	if($cat){
		$listIdCat = json_decode($tidingsStorage->get('category'), true);
		$listIdtidings = array_keys($listIdCat, $cat);
		
	}else{
		$listIdtidings = json_decode($tidingsStorage->get('list'), true); 
	}
	if($listIdtidings == false){
		$return.= $tplNotidings;
	}else{
		if($sort == 'reverse'){
			//перевернули масив для вывода новостей в обратном порядке
			$listIdtidings = array_reverse($listIdtidings);
		}
		if($sort == 'random'){
			shuffle($listIdtidings);
		}
		if(!$start){
			$start = 0;
		}
		for($i = 0 + $start; $i < $col + $start; ++$i){
			if(isset($listIdtidings[$i])){
				$tidingsParam = json_decode($tidingsStorage->get('tidings_'.$listIdtidings[$i]));
			}else{
				$tidingsParam = false;
			}
			if ($tidingsParam != false){
				$categoryname = tidingsCategoryName($tidingsParam->cat);
				if(!$categoryname) $categoryname = 'Без категории';
				
				$categoryuri = $tidingsParam->cat != ''?'/'.$tidingsConfig->idPage.'/category/'.$tidingsParam->cat:($Config->indexPage == $tidingsConfig->idPage?'/':'/'.$tidingsConfig->idPage);

				$out_prev = str_replace('#header#', $tidingsParam->header, $tpl);
				$out_prev = str_replace('#content#', $tidingsParam->prev, $out_prev);
				$out_prev = str_replace('#date#', date($tidingsConfig->formatDate, isset($tidingsParam->time)?$tidingsParam->time:strtotime($tidingsParam->date)), $out_prev);
				$out_prev = str_replace('#time#', date('H:i', isset($tidingsParam->time)?$tidingsParam->time:strtotime($tidingsParam->date)), $out_prev);
				$out_prev = str_replace('#com#', $tidingsStorage->iss('count_'.$listIdtidings[$i])?$tidingsStorage->get('count_'.$listIdtidings[$i]):0, $out_prev);
				$out_prev = str_replace('#img#', $tidingsParam->img, $out_prev);
				$out_prev = str_replace('#categoryname#', $categoryname, $out_prev);
				$out_prev = str_replace('#categoryuri#', $categoryuri, $out_prev);
				$out_prev = str_replace('#index#', $i, $out_prev);
				foreach($tidingsConfig->custom as $value){
					$out_prev = str_replace('#'.$value->id.'#', (isset($tidingsParam->custom->{$value->id})?$tidingsParam->custom->{$value->id}:''), $out_prev);
				}
				$return.=  str_replace('#uri#', '/'.$tidingsConfig->idPage.'/'.$listIdtidings[$i], $out_prev);
			}
		}
	}
	return $return;
}
?>