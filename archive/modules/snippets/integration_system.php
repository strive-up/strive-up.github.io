<?php
if (!class_exists('System')) exit; // Запрет прямого доступа

$SnippetsStorage = new EngineStorage('module.snippets');
if($SnippetsStorage->iss('snippets')){
	$snippets = json_decode($SnippetsStorage->get('snippets'), true); // Получили список ввиде массива
}
if(!isset($snippets) || !is_array($snippets)){ 
	$snippets = array(); 
	// $snippets[] = array('id' => 'address', 'name' => 'Адрес', 'type' => 'text', 'snippet' => '117292, Московская область. г. Москва, ул. Кржижановского д. 8а');
	// $snippets[] = array('id' => 'telephone1', 'name' => 'Телефон 1', 'type' => 'text', 'snippet' => '+7 (123) 456-78-90');
	// $snippets[] = array('id' => 'telephone2', 'name' => 'Телефон 2', 'type' => 'text', 'snippet' => '+7 (098) 765-43-21');
	// $snippets[] = array('id' => 'email', 'name' => 'Email адрес', 'type' => 'text', 'snippet' => 'example@example.com');
	// $snippets[] = array('id' => 'openingHours', 'name' => 'Часы работы', 'type' => 'text', 'snippet' => 'Пн-Пт, 9:00 – 18:00');
}
if(file_exists(DR.'/modules/'.$Config->template.'/snippets.json')){
	$snippets_tpl = json_decode(file_get_contents(DR.'/modules/'.$Config->template.'/snippets.json'), true);
	function snipets_diff($a1, $a2){
		return strcmp($a1['id'], $a2['id']);
	}
	$snippets = array_merge(array_udiff($snippets_tpl, $snippets, 'snipets_diff'), $snippets);
}

$Snippet = new stdClass();
foreach($snippets as $value){
	$Snippet->{$value['id']} = $value['snippet'];
}
?>