<?php
if (!isset($Config)) global $Config;
$worksStorage = new EngineStorage('module.works2');
if($worksStorage->iss('worksConfig')){
	$worksConfig = json_decode($worksStorage->get('worksConfig'));
}
if(!isset($worksConfig)){
	$worksConfig = new stdClass();
}
// Настройки поумолчанию
if(!isset($worksConfig->navigation)) $worksConfig->navigation = 8;
if(!isset($worksConfig->countInBlok)) $worksConfig->countInBlok = 3;
if(!isset($worksConfig->formatDate)) $worksConfig->formatDate = 'd.m.Y';
if(!isset($worksConfig->idPage)) $worksConfig->idPage = 'works';
if(!isset($worksConfig->idUser)) $worksConfig->idUser = 'user';

$worksConfig->blokTemplate = file_exists(Module::pathRun($Config->template, 'works.blok.template'))?file_get_contents(Module::pathRun($Config->template, 'works.blok.template')):
'<article class="nblok">
<p style="padding-bottom:0px;"><a href="#uri#">#header#</a></p>
#content#
<p>Категория: <a href="#categoryuri#">#categoryname#</a></p>
</article>';

$worksConfig->prevTemplate = file_exists(Module::pathRun($Config->template, 'works.prev.template'))?file_get_contents(Module::pathRun($Config->template, 'works.prev.template')):
'<article class="works">
<h2><a href="#uri#">#header#</a></h2>
<p class="i"><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p class="t">#date# | Категория: <a href="#categoryuri#">#categoryname#</a> | <a href="#uri#">Подробнее</a></p>
</article>';

$worksConfig->contentTemplate =  file_exists(Module::pathRun($Config->template, 'works.content.template'))?file_get_contents(Module::pathRun($Config->template, 'works.content.template')):
'<p><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p>#date# | Категория: <a href="#categoryuri#">#categoryname#</a></p>';

if(!isset($worksConfig->commentTemplate)) $worksConfig->commentTemplate = "<!-- Source Comment -->\r\n";
if(!isset($worksConfig->commentEngine)) $worksConfig->commentEngine = 1;
if(!isset($worksConfig->commentEnable)) $worksConfig->commentEnable = 1;
if(!isset($worksConfig->commentRules)) $worksConfig->commentRules = 1;
if(!isset($worksConfig->commentModeration)) $worksConfig->commentModeration = 1;
if(!isset($worksConfig->commentModerationNumPost)) $worksConfig->commentModerationNumPost = 10;
if(!isset($worksConfig->commentMaxLength)) $worksConfig->commentMaxLength = 1000;
if(!isset($worksConfig->commentNavigation)) $worksConfig->commentNavigation = 100;
if(!isset($worksConfig->commentMaxCount)) $worksConfig->commentMaxCount = 1000;
if(!isset($worksConfig->commentCheckInterval)) $worksConfig->commentCheckInterval = 15000;
if(!isset($worksConfig->cat)) $worksConfig->cat = array();
if(!isset($worksConfig->blokCat)) $worksConfig->blokCat = 0;
if(!isset($worksConfig->indexCat)) $worksConfig->indexCat = 0;
if(!isset($worksConfig->turbo)) $worksConfig->turbo = 0;
if(!isset($worksConfig->turboItems)) $worksConfig->turboItems = 1000;
if(!isset($worksConfig->turboId)) $worksConfig->turboId = 'turbo';
if(!isset($worksConfig->turboCacheTime)) $worksConfig->turboCacheTime = 3600;
if(!isset($worksConfig->custom)) $worksConfig->custom = array();
if(!isset($worksConfig->turboExceptions)) $worksConfig->turboExceptions = 'test1, test2, test3';
?>