<?php
require(DR.'/modules/expert/cfg.php');

function expertBBCode($html){
	$html = trim($html[1]);
	$html = str_replace("\t",'&nbsp;&nbsp;&nbsp;',$html);
	$html = str_replace('  ',' &nbsp;',$html);
	$html = preg_replace('/&quot;(.*?)&quot;/', '<span class="quot">&quot;\1&quot;</span>', $html);
	$html = preg_replace('/\'(.*?)\'/', '<span class="quot">\'\1\'</span>', $html);
	$html = str_replace("\n",'<br>', $html);
	$html = specfilter($html);
	return '<pre><code>'.$html.'</code></pre>';
}

function expertFormatText($text){
	$text = preg_replace_callback('#\[code\](.*?)\[/code\]#si', 'expertBBCode', $text);
	$text = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;">\1</span>', $text);
	$text = preg_replace('#\[red\](.*?)\[/red\]#si', '<span style="color: #E53935;">\1</span>', $text);
	$text = '<p>'.str_replace("\n",'</p><p>', trim($text)).'</p>';
	$text = specfilter($text);
	$text = str_replace('<p></p>', '', $text);
	return $text;
}

function expertCategoryName($id){
	global $expertConfig;
	$return = false;
	foreach($expertConfig->cat as $key => $value){
		if ($id == $key){
			$return = $value;
		}
	}
	return $return;
}

function expertCategory($cat, $col, $tpl = false, $tplNoexpert = false, $start = false, $sort = 'reverse'){
	global $Config, $Page, $Snippet, $expertStorage, $expertConfig;
	$return = '';
	if($tpl == false){
		$tpl = $expertConfig->blokTemplate;
	}
	if($tplNoexpert == false){
		$tplNoexpert = '<p>Записей пока нет</p>';
	}
	if($cat){
		$listIdCat = json_decode($expertStorage->get('category'), true);
		$listIdexpert = array_keys($listIdCat, $cat);
		
	}else{
		$listIdexpert = json_decode($expertStorage->get('list'), true); 
	}
	if($listIdexpert == false){
		$return.= $tplNoexpert;
	}else{
		if($sort == 'reverse'){
			//перевернули масив для вывода новостей в обратном порядке
			$listIdexpert = array_reverse($listIdexpert);
		}
		if($sort == 'random'){
			shuffle($listIdexpert);
		}
		if(!$start){
			$start = 0;
		}
		for($i = 0 + $start; $i < $col + $start; ++$i){
			if(isset($listIdexpert[$i])){
				$expertParam = json_decode($expertStorage->get('expert_'.$listIdexpert[$i]));
			}else{
				$expertParam = false;
			}
			if ($expertParam != false){
				$categoryname = expertCategoryName($expertParam->cat);
				if(!$categoryname) $categoryname = 'Без категории';
				
				$categoryuri = $expertParam->cat != ''?'/'.$expertConfig->idPage.'/category/'.$expertParam->cat:($Config->indexPage == $expertConfig->idPage?'/':'/'.$expertConfig->idPage);

				$out_prev = str_replace('#header#', $expertParam->header, $tpl);
				$out_prev = str_replace('#content#', $expertParam->prev, $out_prev);
				$out_prev = str_replace('#date#', date($expertConfig->formatDate, isset($expertParam->time)?$expertParam->time:strtotime($expertParam->date)), $out_prev);
				$out_prev = str_replace('#time#', date('H:i', isset($expertParam->time)?$expertParam->time:strtotime($expertParam->date)), $out_prev);
				$out_prev = str_replace('#com#', $expertStorage->iss('count_'.$listIdexpert[$i])?$expertStorage->get('count_'.$listIdexpert[$i]):0, $out_prev);
				$out_prev = str_replace('#img#', $expertParam->img, $out_prev);
				$out_prev = str_replace('#categoryname#', $categoryname, $out_prev);
				$out_prev = str_replace('#categoryuri#', $categoryuri, $out_prev);
				$out_prev = str_replace('#index#', $i, $out_prev);
				foreach($expertConfig->custom as $value){
					$out_prev = str_replace('#'.$value->id.'#', (isset($expertParam->custom->{$value->id})?$expertParam->custom->{$value->id}:''), $out_prev);
				}
				if(Module::exists('snippets')){
					foreach($Snippet as $key => $value){
						$out_prev = str_replace('#'.$key.'#', $value, $out_prev);
					}
				}
				$return.=  str_replace('#uri#', '/'.$expertConfig->idPage.'/'.$listIdexpert[$i], $out_prev);
			}
		}
	}
	return $return;
}
?>