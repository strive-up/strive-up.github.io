<?php
if (!class_exists('System')) exit; // Запрет прямого доступа


?>
<script type="text/javascript">
function dell(url){
return '<div class="a">Подтвердите удаление сниппета</div>' +
	'<div class="b">' +
	'<button type="button" onClick="window.location.href = \''+url+'\';">Удалить</button> '+
	'<button type="button" onclick="closewindow(\'window\');">Отмена</button>'+
	'</div>';
}
</script>
<?php

if($act=='index'){
	if (isset($snippets)){
		echo'<div class="header"><h1>Сниппеты</h1></div>
		<div class="menu_page"><a href="index.php">&#8592; Вернуться назад</a></div>
		<div class="content">
		<p class="row">Сниппеты  - это фрагменты текста, заключенные в специальные переменные или хештеги движка, чтобы удобно использовать шаблонах вывода. 
		Сниппеты могут быть определены самими шаблонами, а также могут добавляться администратором сайта.<br>Подробнее на странице <a href="http://my-engine.ru/snippets" target="_blank">http://my-engine.ru/snippets</a></p>
		<p class="row">
			<a href="module.php?module='.$MODULE.'&amp;act=add" class="button">Добавить сниппет</a>
		</p>';
	
		// $listHistory = array_reverse($listHistory);//перевернули масив для вывода в обратном порядке 
		// $nom = count($snippets);
		
		if(count($snippets) == 0){
			echo'<div class="msg">Снипеты еще не созданы</div>';
		}else{
			echo'
				<table class="tables">
				<tr>
					<td class="tables_head" colspan="2">Название</td>
					<td class="tables_head">Идентификатор</td>
					<td class="tables_head">Содержимое</td>
					<td class="tables_head" >Тип сниппета</td>
					
					<td class="tables_head" style="text-align: right;">&nbsp;</td>
				</tr>';
			foreach($snippets as $key => $value){

				if($value['type'] == 'text'){$type = 'Однострочный';}
				elseif($value['type'] == 'textarea'){$type = 'Многострочный';}
				elseif($value['type'] == 'pic'){$type = 'Картинка';}
				elseif($value['type'] == 'color'){$type = 'Цвет';}
				else{$type = 'Неизвестно';}
				if(function_exists('mb_strimwidth')){
					$snippvalue = mb_strimwidth($value['snippet'], 0, 50, '...');
				}elseif(function_exists('sbstrm')){
					$snippvalue = sbstrm($value['snippet'], 0, 50, '...');
				}else{
					$snippvalue = iconv_substr($value['snippet'], 0, 50, 'UTF-8');
				}
				echo'<tr>
					<td class="img"><img src="include/page.svg" alt=""></td>
					<td><a href="module.php?module='.$MODULE.'&amp;act=edit&amp;key='.$key.'">'.$value['name'].'</a></td>
					<td>'.$value['id'].'</td>
					<td>'.htmlspecialchars($snippvalue).'</td>
					<td>'.$type.'</td>
					<td><a href="javascript:void(0);" onclick="openwindow(\'window\', 650, \'auto\', dell(\'module.php?module='.$MODULE.'&amp;act=dell&amp;key='.$key.'\'));">Удалить</a></td>
				</tr>';
			}
			echo'</table>';
		}
		echo'</div>';
	}else{
		echo'<div class="msg">Необходимо выполнить инициализацию расширений</div>';
	}
}




if ($act == 'edit'){
	$key = isset($_GET['key'])?htmlspecialchars(specfilter($_GET['key'])):false;

	if($key === false){
		echo'<div class="msg">Ошибка данных</div>';
	}elseif(!isset($snippets[$key]['id'])){
		echo'<div class="msg">Ошибка данных</div>';
	}else{
		echo'<div class="header"><h1>Редактирование сниппета</h1></div>
		<div class="menu_page"><a href="module.php?module='.$MODULE.'">&#8592; Вернуться назад</a></div>
		<div class="content">
		<form name="forma" action="module.php?module='.$MODULE.'" method="post">
			<input type="hidden" name="act" value="edit2">
			<input type="hidden" name="key" value="'.$key.'">
			
			<table class="tblform">
			<tr>
				<td>Идентификатор:</td>
				<td><input type="text" name="id" value="'.$snippets[$key]['id'].'"></td>
			</tr>
			<tr>
				<td>Название сниппета:</td>
				<td><input type="text" name="name" value="'.$snippets[$key]['name'].'"></td>
			</tr>
			';
			if($snippets[$key]['type'] == 'text'){
				echo'<tr id="t">
					<td>Содержимое:</td>
					<td><input type="text" name="snippet" value="'.htmlspecialchars($snippets[$key]['snippet']).'"></td>
				</tr>';
			}
			if($snippets[$key]['type'] == 'textarea'){
				echo'<tr id="ta">
					<td>Содержимое:</td>
					<td><textarea name="snippet" style="height: 150px">'.htmlspecialchars($snippets[$key]['snippet']).'</textarea></td>
				</tr>';
			}
			if($snippets[$key]['type'] == 'pic'){
				echo'<tr id="pic">
					<td>Адрес картинки:</td>
					<td>
						<p>
							<input type="text" name="snippet" id="inputimg" value="'.$snippets[$key]['snippet'].'"> 
							<button type="button" onClick="openwindow(\'window\', 750, \'auto\', iframefiles);">Выбрать файл</button><br>
						</p>
						<p><img src="'.$snippets[$key]['snippet'].'" alt="" id="img" style="width: 380px;"></p>
					</td>
				</tr>';
			}
			if($snippets[$key]['type'] == 'color'){
				echo'<tr id="ta">
					<td>Цвет:</td>
					<td><input type="color" name="snippet" value="'.$snippets[$key]['snippet'].'"></td>
				</tr>';
			}
			echo'<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="" value="Сохранить"> &nbsp; <a href="module.php?module='.$MODULE.'">Вернуться назад</a></td>
			</tr>
			</table>
			
		</form>
		</div>
		';
	}
?>
<script type="text/javascript">
// Работа вставки картинки
var iframefiles = '<div class="a"><iframe src="iframefiles.php?id=inputimg" width="100%" height="300" style="border:0;">Ваш браузер не поддерживает плавающие фреймы!</iframe></div>'+
'<div class="b">'+
'<button type="button" onclick="document.getElementById(\'inputimg\').value = \'/modules/news/default.jpg\';closewindow(\'window\');">Вставить фото по умолчанию</button> '+
'<button type="button" onclick="closewindow(\'window\');">Отмена</button>'+
'</div>';
var inputimg = document.getElementById('inputimg');
var lastinputimg = inputimg.value;
setInterval(function(){
	if (inputimg.value != lastinputimg) {
		document.getElementById('img').src = inputimg.value;
		lastinputimg = inputimg.value;
	}
}, 500);
// 
</script>
<?php
	
}

if($act=='edit2'){
	$key = isset($_POST['key'])?htmlspecialchars(specfilter($_POST['key'])):false;
	$id = isset($_POST['id'])?htmlspecialchars(specfilter($_POST['id'])):false;
	$name = isset($_POST['name'])?htmlspecialchars(specfilter($_POST['name'])):'';
	// $type = isset($_POST['type'])?htmlspecialchars(specfilter($_POST['type'])):'';
	$snippet = $_POST['snippet'];
	
	if ($id){
		// if($SnippetsStorage->iss('snippets')){
		// 	$snippets = json_decode($SnippetsStorage->get('snippets'), true); // Получили список ввиде массива
		// }
		if(!isset($snippets) || !is_array($snippets)){ 
			$snippets = array(); 
		}
		if(isset($snippets[$key])){
			$snippets[$key]['id'] = $id;
			$snippets[$key]['name'] = $name;
			// $snippets[$key]['type'] = $snippets[$key]['type'];
			$snippets[$key]['snippet'] = $snippet;
		}
		$snippets = array_values($snippets); // Переиндексировали числовые индексы 
		$SnippetsStorage->set('snippets', json_encode($snippets)); // Записали массив в виде json

		echo'<div class="msg">Сниппет успешно изменен</div>';
		System::notification('Snippets: изменен сниппет с идентификатором '.$snippets[$key]['id'].'', 'g');
	}else{
		echo'<div class="msg">Ошибка данных</div>';
	}
			
?>
<script type="text/javascript">
setTimeout('window.location.href = \'module.php?module=<?php echo $MODULE;?>\';', 3000);
</script>
<?php
}

if($act=='dell'){
	$key = isset($_GET['key'])?htmlspecialchars(specfilter($_GET['key'])):'false';
	
	// if($SnippetsStorage->iss('snippets')){
	// 	$snippets = json_decode($SnippetsStorage->get('snippets'), true); // Получили список ввиде массива
	// }
	
	if(isset($snippets[$key])){
		System::notification('Snippets: удален сниппет с идентификатором '.$snippets[$key]['id'].'', 'g');
		unset($snippets[$key]);
	}

	$snippets = array_values($snippets); // Переиндексировали числовые индексы 
	$SnippetsStorage->set('snippets', json_encode($snippets)); // Записали массив в виде json

	echo'<div class="msg">Сниппет успешно удален</div>';
	
			
?>
<script type="text/javascript">
setTimeout('window.location.href = \'module.php?module=<?php echo $MODULE;?>\';', 3000);
</script>
<?php
}



if ($act == 'add'){
	$uniqid = uniqid('s');
	echo'<div class="header"><h1>Добавление нового сниппета</h1></div>
	<div class="menu_page"><a href="module.php?module='.$MODULE.'">&#8592; Вернуться назад</a></div>
	<div class="content">
	<form name="forma" action="module.php?module='.$MODULE.'" method="post">
		<input type="hidden" name="act" value="add2">
		
		<table class="tblform">
		<tr>
			<td>Идентификатор:</td>
			<td><input type="text" name="id" value="'.$uniqid.'"></td>
		</tr>
		<tr>
			<td>Название сниппета:</td>
			<td><input type="text" name="name" value="Поле '.$uniqid.'"></td>
		</tr>
		<tr>
			<td>Тип сниппета:</td>
			<td>
				<select name="type" onChange="sel();">
				<option class="opt" value="text" id="sel" selected>Однострочное поле
				<option class="opt" value="textarea">Многострочное поле
				<option class="opt" value="pic">Картинка
				<option class="opt" value="color">Цвет
				</select>
				<br><span class="comment">Тип сниппета в будущем изменить нельзя.</span>
			</td>
		</tr>
		<tr id="text">
			<td>Содержимое:</td>
			<td><input type="text" name="snippet_t" value=""></td>
		</tr>
		<tr id="textarea" style="display: none;">
			<td>Содержимое:</td>
			<td>
				<textarea name="snippet_ta" style="height: 150px"></textarea>
			</td>
		</tr>
		<tr id="pic" style="display: none;">
			<td>Адрес картинки:</td>
			<td>
				<p>
					<input type="text" name="snippet_i" id="inputimg" value="/modules/news/default.jpg"> 
					<button type="button" onClick="openwindow(\'window\', 750, \'auto\', iframefiles);">Выбрать файл</button><br>
				</p>
				<p><img src="/modules/news/default.jpg" alt="" id="img" style="width: 380px;"></p>
			</td>
		</tr>
		<tr id="color" style="display: none;">
			<td>Цвет:</td>
			<td>
				 <input type="color" name="snippet_c" value="#ff0000">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="" value="Добавить сниппет"> &nbsp; <a href="module.php?module='.$MODULE.'">Вернуться назад</a></td>
		</tr>
		</table>
		
	</form>
	</div>
	';
	?>
<script type="text/javascript">
function sel() {
	var cells = document.getElementsByClassName("opt");
	for (var i = 0; i < cells.length; i++) {
		document.getElementById(cells[i].value).style.display = 'none';
		if(cells[i].selected){
			document.getElementById(cells[i].value).style.display = '';
			console.log(cells[i].value);
		}
	}
}

// Работа вставки картинки
var iframefiles = '<div class="a"><iframe src="iframefiles.php?id=inputimg" width="100%" height="300" style="border:0;">Ваш браузер не поддерживает плавающие фреймы!</iframe></div>'+
'<div class="b">'+
'<button type="button" onclick="document.getElementById(\'inputimg\').value = \'/modules/news/default.jpg\';closewindow(\'window\');">Вставить фото по умолчанию</button> '+
'<button type="button" onclick="closewindow(\'window\');">Отмена</button>'+
'</div>';
var inputimg = document.getElementById('inputimg');
var lastinputimg = inputimg.value;
setInterval(function(){
	if (inputimg.value != lastinputimg) {
		document.getElementById('img').src = inputimg.value;
		lastinputimg = inputimg.value;
	}
}, 500);
// 
</script>
<?php
}


if($act=='add2'){
	
	$id = isset($_POST['id'])?htmlspecialchars(specfilter($_POST['id'])):false;
	$name = isset($_POST['name'])?htmlspecialchars(specfilter($_POST['name'])):'';
	$type = isset($_POST['type'])?htmlspecialchars(specfilter($_POST['type'])):'';

	if ($type == 'text'){
		$snippet = $_POST['snippet_t'];
	} elseif ($type == 'textarea'){
		$snippet = $_POST['snippet_ta'];
	} elseif ($type == 'pic'){
		$snippet = htmlspecialchars(specfilter($_POST['snippet_i']));
	} elseif ($type == 'color'){
		$snippet = htmlspecialchars(specfilter($_POST['snippet_c']));
	} else {
		$snippet = '';
	}
	
	if ($id){
		// if($SnippetsStorage->iss('snippets')){
		// 	$snippets = json_decode($SnippetsStorage->get('snippets'), true); // Получили список ввиде массива
		// }
		if(!isset($snippets) || !is_array($snippets)){ 
			$snippets = array(); 
		}
		$snippets[] = array('id' => $id, 'name' => $name, 'type' => $type, 'snippet' => $snippet); // Добавили новый элемент массива в конец
		$snippets = array_values($snippets); // Переиндексировали числовые индексы 
		$SnippetsStorage->set('snippets', json_encode($snippets)); // Записали массив в виде json

		echo'<div class="msg">Сниппет успешно добавлен</div>';
		System::notification('Snippets: добавлен новый сниппет с идентификатором '.$id.'', 'g');
	}else{
		echo'<div class="msg">Ошибка данных</div>';
	}
			
?>
<script type="text/javascript">
setTimeout('window.location.href = \'module.php?module=<?php echo $MODULE;?>\';', 3000);
</script>
<?php
}

?>