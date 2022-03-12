<?php
if (!isset($Config)) global $Config;
$tidingsStorage = new EngineStorage('module.tidings2');
if($tidingsStorage->iss('tidingsConfig')){
	$tidingsConfig = json_decode($tidingsStorage->get('tidingsConfig'));
}
if(!isset($tidingsConfig)){
	$tidingsConfig = new stdClass();
}
// Настройки поумолчанию
if(!isset($tidingsConfig->navigation)) $tidingsConfig->navigation = 8;
if(!isset($tidingsConfig->countInBlok)) $tidingsConfig->countInBlok = 3;
if(!isset($tidingsConfig->formatDate)) $tidingsConfig->formatDate = 'd.m.Y';
if(!isset($tidingsConfig->idPage)) $tidingsConfig->idPage = 'tidings';
if(!isset($tidingsConfig->idUser)) $tidingsConfig->idUser = 'user';

$tidingsConfig->blokTemplate = file_exists(Module::pathRun($Config->template, 'news.blok.template'))?file_get_contents(Module::pathRun($Config->template, 'news.blok.template')):
'<article class="nblok">
<p style="padding-bottom:0px;"><a href="#uri#">#header#</a></p>
#content#
<p>Категория: <a href="#categoryuri#">#categoryname#</a></p>
</article>';

$tidingsConfig->prevTemplate = file_exists(Module::pathRun($Config->template, 'docs.prev.template'))?file_get_contents(Module::pathRun($Config->template, 'docs.prev.template')):
'<article class="tidings">
<h2><a href="#uri#">#header#</a></h2>
<p class="i"><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p class="t">#date# | Категория: <a href="#categoryuri#">#categoryname#</a> | <a href="#uri#">Подробнее</a></p>
</article>';

$tidingsConfig->contentTemplate =  file_exists(Module::pathRun($Config->template, 'news.content.template'))?file_get_contents(Module::pathRun($Config->template, 'news.content.template')):
'<p><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p>#date# | Категория: <a href="#categoryuri#">#categoryname#</a></p>';

if(!isset($tidingsConfig->commentTemplate)) $tidingsConfig->commentTemplate = "<!-- Source Comment -->\r\n";
if(!isset($tidingsConfig->commentEngine)) $tidingsConfig->commentEngine = 1;
if(!isset($tidingsConfig->commentEnable)) $tidingsConfig->commentEnable = 1;
if(!isset($tidingsConfig->commentRules)) $tidingsConfig->commentRules = 1;
if(!isset($tidingsConfig->commentModeration)) $tidingsConfig->commentModeration = 1;
if(!isset($tidingsConfig->commentModerationNumPost)) $tidingsConfig->commentModerationNumPost = 10;
if(!isset($tidingsConfig->commentMaxLength)) $tidingsConfig->commentMaxLength = 1000;
if(!isset($tidingsConfig->commentNavigation)) $tidingsConfig->commentNavigation = 100;
if(!isset($tidingsConfig->commentMaxCount)) $tidingsConfig->commentMaxCount = 1000;
if(!isset($tidingsConfig->commentCheckInterval)) $tidingsConfig->commentCheckInterval = 15000;
if(!isset($tidingsConfig->cat)) $tidingsConfig->cat = array();
if(!isset($tidingsConfig->blokCat)) $tidingsConfig->blokCat = 0;
if(!isset($tidingsConfig->indexCat)) $tidingsConfig->indexCat = 0;
if(!isset($tidingsConfig->turbo)) $tidingsConfig->turbo = 0;
if(!isset($tidingsConfig->turboItems)) $tidingsConfig->turboItems = 1000;
if(!isset($tidingsConfig->turboId)) $tidingsConfig->turboId = 'turbo';
if(!isset($tidingsConfig->turboCacheTime)) $tidingsConfig->turboCacheTime = 3600;
if(!isset($tidingsConfig->custom)) $tidingsConfig->custom = array();
if(!isset($tidingsConfig->turboExceptions)) $tidingsConfig->turboExceptions = 'test1, test2, test3';

?>