<?php
if (!class_exists('System')) exit; // Запрет прямого доступа


// rss для Дзена и Пульса
if($MODULE_URI == '/rss.xml'){
header('Content-Type: text/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
	xmlns:yandex="http://news.yandex.ru"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:media="http://search.yahoo.com/mrss/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:georss="http://www.georss.org/georss">
    <channel>
		<title>'.$Config->header.'</title>
		<atom:link href="'.$Config->protocol.'://'.SERVER.'/'.$URI[1].'/rss.xml" rel="self" type="application/rss+xml" />
        <link>'.$Config->protocol.'://'.SERVER.($Page->isIndexPage()?'':'/'.$URI[1]).'</link>
        <description>'.$Page->description.'</description>
		<language>ru</language>';
		if(($listIdexpert = json_decode($expertStorage->get('list'), true)) != false){
			//перевернули масив для вывода новостей в обратном порядке
			$listIdexpert = array_reverse($listIdexpert);

			for($i = 0; $i < 10; $i++){
				if(isset($listIdexpert[$i])){
					if($expertStorage->iss('expert_'.$listIdexpert[$i])){
						$expertParam = json_decode($expertStorage->get('expert_'.$listIdexpert[$i]));
		echo'
		<item>
			<title>'.$expertParam->header.'</title>
			<link>'.$Config->protocol.'://'.SERVER.'/'.$URI[1].'/'.$listIdexpert[$i].'</link>
			<guid>'.$Config->protocol.'://'.SERVER.'/'.$URI[1].'/'.$listIdexpert[$i].'</guid>
			<media:rating scheme="urn:simple">nonadult</media:rating>
			<pubDate>'.date("D, d M Y H:i:s O", isset($expertParam->time)?$expertParam->time:strtotime($expertParam->date)).'</pubDate>
			<author>Administrator</author>
			<enclosure url="'.$Config->protocol.'://'.SERVER.$expertParam->img.'" type="image/jpeg" length="'.filesize(DR.'/'.$expertParam->img).'"/>
			<description>
				<![CDATA['.trim(strip_tags($expertParam->prev)).']]>
			</description>
			<content:encoded>
				<![CDATA['.trim($expertParam->content).']]>
			</content:encoded>
			<yandex:full-text>
				<![CDATA['.trim(strip_tags($expertParam->content)).']]>
			</yandex:full-text>
		</item>';
					}
				}
			}
		}
echo'
	</channel>
</rss>';
ob_end_flush(); exit;
}




// Турбо страницы с разбитием
if(isset($URI[2]) && isset($URI[3]) && !isset($URI[4])){
	if($URI[2] == $expertConfig->turboId){
		
		if(!$expertConfig->turbo){
			header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		}

		$numRSS = basename($URI[3], ".xml");
		if(is_numeric($numRSS) == false || $numRSS < 1){
			header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		}

		if(($listIdexpert = json_decode($expertStorage->get('list'), true)) == false){
			header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		}

		// // Исключения
		$turboExceptions = explode(',', str_replace(' ', '', $expertConfig->turboExceptions));
		$listIdexpert = array_diff($listIdexpert, $turboExceptions);
		// Переиндексировали числовые индексы 
		$listIdexpert = array_values($listIdexpert);
			
		$nom = count($listIdexpert);
		$countPage = ceil($nom / $expertConfig->turboItems);
		
		if($numRSS > $countPage){
			header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		}

		$genTurboSource = false;
		if ($expertStorage->iss('turboSource'.$numRSS)){
			if ($expertStorage->time('turboSource'.$numRSS) + $expertConfig->turboCacheTime < time()){
				$genTurboSource = true;
			}
		}else{
			$genTurboSource = true;
		}

header('Content-Type: text/xml; charset=utf-8');
if($genTurboSource){
$inner = '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
xmlns:yandex="http://expert.yandex.ru"
xmlns:media="http://search.yahoo.com/mrss/"
xmlns:turbo="http://turbo.yandex.ru">
<channel>
<title>'.$Config->header.'</title>
<link>'.$Config->protocol.'://'.SERVER.'</link>
<description>'.$Page->description.'</description>
<language>ru</language>';
$i = ($numRSS - 1) * $expertConfig->turboItems;
$var = $i + $expertConfig->turboItems;
while($i < $var && $i < $nom){
if(isset($listIdexpert[$i])){
if($expertStorage->iss('expert_'.$listIdexpert[$i])){
$expertParam = json_decode($expertStorage->get('expert_'.$listIdexpert[$i]));
$inner.= '
<item turbo="true">
<title>'.$expertParam->header.'</title>
<link>'.$Config->protocol.'://'.SERVER.'/'.$URI[1].'/'.$listIdexpert[$i].'</link>
<pubDate>'.date("D, d M Y H:i:s O", isset($expertParam->time)?$expertParam->time:strtotime($expertParam->date)).'</pubDate>
<turbo:content>
<![CDATA[
<header>
<h1>'.$expertParam->header.'</h1>
<figure>
<img src="'.$Config->protocol.'://'.SERVER.$expertParam->img.'"/>
</figure>
</header>
'.trim($expertParam->content).'
]]>
</turbo:content>
</item>';
}
}
++$i;
}
$inner.= '
</channel>
</rss>';
$expertStorage->set('turboSource'.$numRSS, $inner); // записали кеш
echo $inner; // вывели кеш
}else{
echo $expertStorage->get('turboSource'.$numRSS); // вывели кеш
}
ob_end_flush(); exit;	
}
}

// Обработка ajax
if(isset($URI[3]) && isset($URI[4])){
	if($URI[3] == 'ajax'){
		header("Cache-Control: no-store, no-cache, must-revalidate");// не даем кешировать ajax тупым браузерам (IE)
		switch ($URI[4]) {
			
			case 'newcommentcheck':
				if($expertStorage->iss('count_'.$URI[2])){
					echo $expertStorage->get('count_'.$URI[2]);
				}else{
					echo 0;
				}
				break;
			
			case 'addcomment':
				// if (md5($_POST['ticket'].$Config->ticketSalt) != $_COOKIE['ticket_'.$URI[2]]){
				// 	echo'Ticket';
				// }
				if (parse_url(REFERER, PHP_URL_HOST) != SERVER){
					echo'Ticket';
				}elseif($User->authorized){
					
					if($expertConfig->commentRules > 1 && $User->preferences == 0){
						// ошибка если нехватает префов
						echo'Error';
					}else{
						// Обрабатываем форму от авторизированных
						
						if($expertStorage->iss('expert_'.$URI[2])){
							
								// Обрабатываем форму от пользователя
								$textForm = trim(htmlspecialchars($_POST['text']));
								
								if(strlen($textForm) <= $expertConfig->commentMaxLength && strlen($textForm) > 0){
									
									
									$idComment = $expertStorage->iss('idComment')?$expertStorage->get('idComment'):0;
									++$idComment;
									$expertStorage->set('idComment', $idComment);
									
									
									if($expertConfig->commentModeration == 0){$published = 1;}
									elseif($expertConfig->commentModeration == 1){$published = ($User->numPost >= $expertConfig->commentModerationNumPost)?1:0;}
									elseif($expertConfig->commentModeration == 2){$published = ($User->preferences > 0)?1:0;}
									else{$published = 0;}
									
									if ($published){
										$arrayComments = json_decode($expertStorage->get('comments_'.$URI[2]), true);
										$arrayComments[] = array(
													'id' => $idComment,
													'login' => $User->login,
													'text' => $textForm,
													'ip' => IP,
													'status' => 'user',
													'time' => time());
										
										$arrayCount = count($arrayComments);
										if($arrayCount >= $expertConfig->commentMaxCount){
											$arrayStart = $arrayCount -  round($expertConfig->commentMaxCount / 1.5);
											$arrayComments = array_slice($arrayComments, $arrayStart, $arrayCount);
										}
										
										if($expertStorage->set('comments_'.$URI[2], json_encode($arrayComments))){
											
											++$User->numPost;
											$User->save();
											
											$count = $expertStorage->iss('count_'.$URI[2])?$expertStorage->get('count_'.$URI[2]):0;
											++$count;
											$expertStorage->set('count_'.$URI[2], $count);
											
											echo $count;
											
										}else{
											echo'Error';
										}
										unset($arrayComments);
										
									}else{
										echo'Moderation';
									}
									
									
									
									
									
									
									// в список последних 
									$lastComments = json_decode($expertStorage->get('lastComments'), true);
									$lastComments[] = array(
												'idComment' => $idComment,
												'idexpert' => $URI[2],
												'login' => $User->login,
												'text' => $textForm,
												'ip' => IP,
												'status' => 'user',
												'published' => $published,
												'time' => time());
									$expertStorage->set('lastComments', json_encode($lastComments));
									
									
								}else{
									echo'Error';
								}
							
						}else{
							echo'Error';
						}
					}
				}else{
					if($expertStorage->iss('expert_'.$URI[2])){
						if(array_search(IP, $Config->ipBan)){
							echo'Ban';
						}elseif($expertConfig->commentRules > 0){
							// ошибка необходимости авторизироваться
							echo'Error';
						}else{
							// Обрабатываем форму от гостей
							$loginForm = htmlspecialchars(specfilter($_POST['login']));
							$textForm = trim(htmlspecialchars($_POST['text']));
							
							if (md5(strtolower($_POST['captcha']).$Config->ticketSalt) != $_COOKIE['captcha']){
								echo'Captcha';
							}elseif(System::validPath($loginForm) && strlen($loginForm) < 36 && strlen($textForm) <= $expertConfig->commentMaxLength && strlen($textForm) > 0){
								if (User::exists($loginForm)){
									echo'Exists';
								}else{
									
									
									$idComment = $expertStorage->iss('idComment')?$expertStorage->get('idComment'):0;
									++$idComment;
									$expertStorage->set('idComment', $idComment);
									
									
									
									$published = ($expertConfig->commentModeration == 0)?1:0;
									
									
									if ($published){
										$arrayComments = json_decode($expertStorage->get('comments_'.$URI[2]), true);
										$arrayComments[] = array(
													'id' => $idComment,
													'login' => $loginForm,
													'text' => $textForm,
													'ip' => IP,
													'status' => 'gost',
													'time' => time());
										
										$arrayCount = count($arrayComments);
										if($arrayCount >= $expertConfig->commentMaxCount){
											$arrayStart = $arrayCount -  round($expertConfig->commentMaxCount / 1.5);
											$arrayComments = array_slice($arrayComments, $arrayStart, $arrayCount);
										}
										
										if($expertStorage->set('comments_'.$URI[2], json_encode($arrayComments))){
											
											$count = $expertStorage->iss('count_'.$URI[2])?$expertStorage->get('count_'.$URI[2]):0;
											++$count;
											$expertStorage->set('count_'.$URI[2], $count);
											echo $count;
											
										}else{
											echo'Error';
										}
										unset($arrayComments);
										
									}else{
										echo'Moderation';
									}
									
									
									// в список последних 
									$lastComments = json_decode($expertStorage->get('lastComments'), true);
									$lastComments[] = array(
												'idComment' => $idComment,
												'idexpert' => $URI[2],
												'login' => $loginForm,
												'text' => $textForm,
												'ip' => IP,
												'status' => 'gost',
												'published' => $published,
												'time' => time());
									$expertStorage->set('lastComments', json_encode($lastComments));
									
								}
							}else{
								echo'Error';
							}
							setcookie('captcha','',time(),'/');// Обнулили куки
						}
					}else{
						echo'Error';
					}
				}
				break;
				
			case 'validlogin':
				if (System::validPath($_POST['login'])){
					if (User::exists($_POST['login'])){
						echo $_POST['login'].' уже существует';
					}
				}else{
					echo 'Недопустимые символы';
				}
				break;
			
			
			
			case 'dellcomments':
				if (md5($_POST['ticket'].$Config->ticketSalt) != $_COOKIE['ticket_'.$URI[2]]){
					echo'Ticket';
				}elseif($expertStorage->iss('expert_'.$URI[2]) && ($User->preferences > 0 || $status == 'admin')){
					$arrayComments = json_decode($expertStorage->get('comments_'.$URI[2]), true);
					$count = 0;
					
					// foreach($_POST['comment'] as $value){
						// if(isset($arrayComments[$value])){
							// unset($arrayComments[$value]);
							// ++$count;
						// }
					// }
					
					foreach($arrayComments as $i => $row){
						if (in_array($row['id'], $_POST['comment'])){
							unset($arrayComments[$i]);
							++$count;
						}
					}
					
					if($count > 0){
						// Переиндексировали числовые индексы 
						$arrayComments = array_values($arrayComments); 
						// сохраняем массив комментов
						if($expertStorage->set('comments_'.$URI[2], json_encode($arrayComments))){
							echo $count;
						}else{ echo'Error'; }
					}else{ echo'Error'; }
				}else{ echo'Error'; }
				break;
			
			case 'loadcomments':
				if (is_numeric($URI[5]) && $URI[5] >= 0){
					if($expertStorage->iss('comments_'.$URI[2])){
						$arrayComments = json_decode($expertStorage->get('comments_'.$URI[2]), true);
						
						for($i = count($arrayComments) - $URI[5] - 1, $x = $i - $expertConfig->commentNavigation, $count = 0; $i >= $x; --$i){
							if($i < 0) break;
							if(file_exists(DR.'/'.$Config->userAvatarDir.'/'.$arrayComments[$i]['login'].'.jpg')){
								$avatar_file = '/'.$Config->userAvatarDir.'/'.$arrayComments[$i]['login'].'.jpg?'.filemtime(DR.'/'.$Config->userAvatarDir.'/'.$arrayComments[$i]['login'].'.jpg');
							}else{
								$avatar_file = '/modules/users/avatar.png';
							}
							echo'<div class="comment" id="comment'.$arrayComments[$i]['id'].'">
								<div class="avatar"><a href="/'.$expertConfig->idUser.'/'.$arrayComments[$i]['login'].'"><img src="'.$avatar_file.'" alt="avatar" id="avatar"></a></div>
								<div class="commentHead">
									<a href="/'.$expertConfig->idUser.'/'.$arrayComments[$i]['login'].'" class="author">'.$arrayComments[$i]['login'].'</a>
									'.($arrayComments[$i]['status'] == 'gost'?'<span class="gost">Гость</span>':'').'
									<span class="time">'.human_time(time() - $arrayComments[$i]['time']).' назад</span>
									'.($expertConfig->commentRules == 0 || $User->authorized ? '<a href="javascript:void(0);"  onClick="Comments.toUser(\''.$arrayComments[$i]['login'].'\')" class="re">Ответить</a>':'').'
									'.($User->preferences > 0 || $status == 'admin' ? '<input type="checkbox" onClick="Comments.commentDellCheck();" name="comment[]" value="'.$arrayComments[$i]['id'].'">':'').'
									
								</div>
								<div class="commentContent">'.expertFormatText($arrayComments[$i]['text']).'</div>
							</div>';
							++$count;
						}
						if ($x > 0){
							echo'<button type="button" id="loadCommentsButton" onclick="Comments.loadComments('.($URI[5] + $expertConfig->commentNavigation + 1).');">Загрузить ещё</button>';
						}
						if ($count == 0){
							echo'<div class="noComments">Нет ни одного комментария</div>';
						}
						
					}else{
						echo'<div class="noComments">Нет ни одного комментария</div>';
					}
				}else{
					echo 'Ошибка при загрузки сообщений';
				}
				break;
				
			default :
				echo'Error';
				break;
		}
		 ob_end_flush(); exit;
	}
}










// Встраивание в страницу

$return = '';

$showact = isset($URI[2])?$URI[2]:'nav';

if($showact != 'nav' && $showact != 'category'){
	
	$URI[2] = htmlspecialchars(specfilter($URI[2]));
	
	if(isset($URI[3]) || !$expertParam = json_decode($expertStorage->get('expert_'.$URI[2]))){
		
		header(PROTOCOL.' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		
	}else{
		$canPageName = $page->name;

		$page->title = $expertParam->header;
		$page->name = $page->title;
		$page->keywords = $expertParam->keywords;
		$page->description = $expertParam->description;
		$page->headhtml.= '<script type="text/javascript">'.file_get_contents('modules/'.$page->module.'/jloader/jloader.min.js').'</script>';
		$page->headhtml.= '<script type="text/javascript">'.file_get_contents('modules/'.$page->module.'/comments.min.js').'</script>';
		$page->headhtml.= '<style type="text/css">'.file_get_contents('modules/'.$page->module.'/style.css').'</style>';
		$page->headhtml.= '
<meta property="og:url"                content="/'.$URI[1].'/'.$URI[2].'" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="'.$expertParam->header.'" />
<meta property="og:description"        content="'.$expertParam->description.'" />
<meta property="og:image"              content="'.$expertParam->img.'" />
<link rel="canonical" href="'.$Config->protocol.'://'.SERVER.'/'.$URI[1].'/'.$URI[2].'"/>
';
		

		$page->clear();// Очистили страницу перед выводом
		

		$categoryname = expertCategoryName($expertParam->cat);
		if(!$categoryname) $categoryname = 'Без категории';
		
		$categoryuri = $expertParam->cat != ''?'/'.$URI[1].'/category/'.$expertParam->cat:($Page->isIndexPage()?'/':'/'.$URI[1]);


		$out_content = str_replace('#content#', $expertParam->content, $expertConfig->contentTemplate);
		$out_content = str_replace('#header#', $expertParam->header, $out_content);
		$out_content = str_replace('#canpagename#', $canPageName, $out_content);
		$out_content = str_replace('#date#', date($expertConfig->formatDate, isset($expertParam->time)?$expertParam->time:strtotime($expertParam->date)), $out_content);
		$out_content = str_replace('#com#', $expertStorage->iss('count_'.$URI[2])?$expertStorage->get('count_'.$URI[2]):0, $out_content);
		$out_content = str_replace('#img#', $expertParam->img, $out_content);
		$out_content = str_replace('#categoryname#', $categoryname, $out_content);
		$out_content = str_replace('#categoryuri#', $categoryuri, $out_content);
		$out_content = str_replace('#uri#', '/'.$URI[1].'/'.$URI[2], $out_content);
		foreach($expertConfig->custom as $value){
			$out_content = str_replace('#'.$value->id.'#', (isset($expertParam->custom->{$value->id})?$expertParam->custom->{$value->id}:''), $out_content);
		}
		if(Module::exists('snippets')){
			foreach($Snippet as $key => $value){
				$out_content = str_replace('#'.$key.'#', $value, $out_content);
			}
		}
		$return.= str_replace('#home#','/'.($URI[1] != $Config->indexPage?$URI[1]:''), $out_content);
		
		
		if($expertConfig->commentEngine && $expertConfig->commentEnable && $expertParam->comments){
			
			$ticket = random(255);
			setcookie('ticket_'.$URI[2], md5($ticket.$Config->ticketSalt),time()+32000000, '/');
					
			$return.= '
				<div id="moduleexpertComments">
				<h3 id="commentsHeader">Комментарии</h3>';
			
			if($User->authorized){
				
				if($expertConfig->commentRules > 1 && $User->preferences == 0){
					// Показываем сообщение об ошибки если нехватает префов
					$return.= '<div id="errorPref">В данный момент Вы не можете оставлять сообщения</div>';
					
					
				}else{
					// Показываем форму для авторизированных
					
					$return.= '
					<form name="commentForm" action="#" method="post" onsubmit="return false;">
					<INPUT TYPE="hidden" NAME="ticket" VALUE="'.$ticket.'">
					<INPUT TYPE="hidden" NAME="act" VALUE="add">
					<div id="commentForm">
						<p>Сообщение: <span id="textReport"></span><br><textarea id="textForm" name="text" required></textarea></p>
						<p><button type="button" onclick="Comments.submitCommentForm();">Отправить</button></p>	
					</div>
					</form>
					';
					
					
				}
				
			}else{
				
				if($expertConfig->commentRules > 0){
					// Показываем сообщение об необходимости авторизироваться
					$return.= '<div id="errorAuth">Чтобы оставлять сообщения необходимо авторизоваться</div>';
				}else{
					// Показываем форму для гостей
					$return.= '
					<form name="commentForm" action="#" method="post" onsubmit="return false;">
					<INPUT TYPE="hidden" NAME="ticket" VALUE="'.$ticket.'">
					<INPUT TYPE="hidden" NAME="act" VALUE="add">
					<div id="commentForm">
						<p class="p_login">Логин: <span id="loginReport"></span><br><input id="loginForm" type="text" name="login" value="" required></p>
						<p class="p_text">Сообщение: <span id="textReport"></span><br><textarea id="textForm" name="text" required></textarea></p>'
						.(Module::exists('captcha')?'
							<p class="p_captcha_img" style="line-height:1;"><img id="captcha" src="/modules/captcha/captcha.php?rand='.rand(0, 99999).'" alt="captcha"  onclick="document.getElementById(\'captcha\').src = \'/modules/captcha/captcha.php?\' + Math.random()" style="cursor:pointer;">
								<br><span style="font-size:12px; opacity: 0.7;">Для обновления символов нажмите на картинку</span>
							</p>
							<p class="p_captcha_input">Символы с картинки:<br><input id="captchaForm" type="text" name="captcha" value=""  autocomplete="off" required></p>

						':'').
						'<p class="p_submit"><button type="submit" onclick="Comments.submitCommentForm();">Отправить</button></p>	
					</div>
					</form>
					';
					
					
				}
				
			}
			
			
			$return.= '
				<div id="requestReport"></div>
				<div id="comments">Загрузка...</div>
			';
			
			if($User->preferences > 0 || $status == 'admin'){
				$return.= '<button type="button" id="commentDellButton" onclick="Comments.commentDell();">Удалить выделенное</button>';
			}
			$return.= '
				<script>
					Comments.run({
						id: "'.$URI[2].'",
						ticket: "'.$ticket.'",
						newCommentCheckInterval: '.$expertConfig->commentCheckInterval.',
						commentMaxLength: '.$expertConfig->commentMaxLength.'
					});
				</script>
			</div>';
			
		}else{
			$return.= ($expertParam->comments == '1')?$expertConfig->commentTemplate:'';
		}
	} 
}else{
	$canPageName = $Page->name;
	
	if(isset($URI[5]) || isset($URI[2]) && isset($URI[3]) == false ||
		$showact != 'category' && isset($URI[4])){
		header(PROTOCOL.' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
	}

	if($showact == 'category' && !property_exists($expertConfig->cat, $URI[3])){
		header(PROTOCOL.' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
	}

	if(isset($URI[2])){
		$page->clear(); 
	}

	if($showact == 'category'){
		
		$Page->name = expertCategoryName($URI[3]);
		$Page->title.= ' - '.$Page->name;
		$Page->keywords.= ', '.$Page->name;
		$Page->description.= ' - '.$Page->name;
		if($expertStorage->iss('category')){
			$listIdCat = json_decode($expertStorage->get('category'), true);
		}else{
			$listIdCat = array();
		}
		$listIdexpert = array_keys($listIdCat, $URI[3]);
		if($expertConfig->indexCat != '-1') $return.= '
		<p class="breadcrumb">
			<span class="breadcrumb-item"><a href="/'.($URI[1] != $Config->indexPage?$URI[1]:'').'">'.$canPageName.'</a></span>
			<span class="breadcrumb-slash"> / </span>
			<span class="breadcrumb-item active"><a href="/'.$URI[1].'/category/'.$URI[3].'">'.$Page->name.'</a></span>
			</p>
		';
	}else{
		if($expertConfig->indexCat == '-1'){
			header(PROTOCOL.' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		}elseif($expertConfig->indexCat){
			$listIdCat = json_decode($expertStorage->get('category'), true);
			$listIdexpert = array_keys($listIdCat, $expertConfig->indexCat);
		}else{
			$listIdexpert = json_decode($expertStorage->get('list'), true); 
		}
	}


	if($listIdexpert == false){
		if($expertConfig->indexCat != '-1') $return.= '<p>Записей пока нет</p>';
	}else{
		
		//перевернули масив для вывода новостей в обратном порядке
		$listIdexpert = array_reverse($listIdexpert);
		
		//
		$nom = count($listIdexpert);
		
		//определили количество страниц
		$countPage = ceil($nom / $expertConfig->navigation); 
		
		//проверка правbльности переменной с номером страницы
		if($showact == 'category'){
			if(isset($URI[4])){$nom_page = $URI[4];}else{ $nom_page = 1; }
		}else{
			if(isset($URI[3])){$nom_page = $URI[3];}else{ $nom_page = 1; }
		}
		if(!is_numeric($nom_page) || $nom_page <= 0 || $nom_page > $countPage){
			header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); require('./pages/404.html'); ob_end_flush(); exit();
		}

		// Канонические URL для страниц с навигациями
		if($nom_page == 1){
			$page->headhtml.= '<link rel="canonical" href="'.$Config->protocol.'://'.SERVER.($Page->isIndexPage()?'':'/'.$URI[1]).($showact == 'category'?'/category/'.$URI[3]:'').'">';
		}else{
			$page->headhtml.= '<link rel="canonical" href="'.$Config->protocol.'://'.SERVER.'/'.$URI[1].($showact == 'category'?'/category/'.$URI[3].'/'.$URI[4]:'/nav/'.$URI[3]).'">';
		}

		// добавление к мета тегам при пагинации 
		if($nom_page > 1){
			$page->title.= ' (Страница '.$nom_page.')';
			$page->keywords.= ', Страница '.$nom_page;
			$page->description.= ' (Страница '.$nom_page.')';
		}
		
		//начало навигации
		$i = ($nom_page - 1) * $expertConfig->navigation;
		$var = $i + $expertConfig->navigation;
		
		while($i < $var){
			if($i < $nom){
				if($expertStorage->iss('expert_'.$listIdexpert[$i])){
					$expertParam = json_decode($expertStorage->get('expert_'.$listIdexpert[$i]));
					
					$categoryname = expertCategoryName($expertParam->cat);
					if(!$categoryname) $categoryname = 'Без категории';
					
					$categoryuri = $expertParam->cat != ''?'/'.$URI[1].'/category/'.$expertParam->cat:($Page->isIndexPage()?'/':'/'.$URI[1]);

					$out_prev = str_replace('#header#', $expertParam->header, $expertConfig->prevTemplate);
					$out_prev = str_replace('#canpagename#', $canPageName, $out_prev);
					$out_prev = str_replace('#content#', $expertParam->prev, $out_prev);
					$out_prev = str_replace('#date#', date($expertConfig->formatDate, isset($expertParam->time)?$expertParam->time:strtotime($expertParam->date)), $out_prev);
					$out_prev = str_replace('#com#', $expertStorage->iss('count_'.$listIdexpert[$i])?$expertStorage->get('count_'.$listIdexpert[$i]):0, $out_prev);
					$out_prev = str_replace('#img#', $expertParam->img, $out_prev);
					$out_prev = str_replace('#categoryname#', $categoryname, $out_prev);
					$out_prev = str_replace('#categoryuri#', $categoryuri, $out_prev);
					$out_prev = str_replace('#home#','/'.($URI[1] != $Config->indexPage?$URI[1]:''), $out_prev);
					foreach($expertConfig->custom as $value){
						$out_prev = str_replace('#'.$value->id.'#', (isset($expertParam->custom->{$value->id})?$expertParam->custom->{$value->id}:''), $out_prev);
					}
					if(Module::exists('snippets')){
						foreach($Snippet as $key => $value){
							$out_prev = str_replace('#'.$key.'#', $value, $out_prev);
						}
					}
					$return.=  str_replace('#uri#', '/'.$URI[1].'/'.$listIdexpert[$i], $out_prev);
				}
			}
			++$i;
		}
		if($countPage > 1){	  
			//навигация по номерам страниц
			$return.= '<div class="navigation"><span class="navigation_header">Страницы: </span>';
			
			$a = $nom_page - 3;
			$b = $nom_page + 3;
			
			if($a > 1){
				$return.= '<a href="/'.$URI[1].'/'.($showact == 'category'?'category/'.$URI[3].'/':'nav/').'1" class="link first">1</a>';
				if($a > 2){ $return.= '<span class="space">&nbsp;</span>'; }
			}
			while($a <= $b){
				if(($a > 0) && ($a <= $countPage)){
					if($nom_page == $a){
						$return.= '<span class="this">'.$a.'</span>';
					}else{
						$return.= '<a href="/'.$URI[1].'/'.($showact == 'category'?'category/'.$URI[3].'/':'nav/').''.$a.'" class="link">'.$a.'</a>';
					}
				}
			++$a;
			}
			if($b < $countPage){
				if($b < ($countPage - 1)){ $return.= '<span class="space">&nbsp;</span>'; }
				$return.= '<a href="/'.$URI[1].'/'.($showact == 'category'?'category/'.$URI[3].'/':'nav/').''.$countPage.'" class="link last">'.$countPage.'</a>';
			}
			
			$return.= '</div>';
			//конец навигации*/
		}
		
		
		
	}
	
	
}
return $return;
?>