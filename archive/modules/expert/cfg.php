<?php
if (!isset($Config)) global $Config;
$expertStorage = new EngineStorage('module.expert2');
if($expertStorage->iss('expertConfig')){
	$expertConfig = json_decode($expertStorage->get('expertConfig'));
}
if(!isset($expertConfig)){
	$expertConfig = new stdClass();
}
// Настройки поумолчанию
if(!isset($expertConfig->navigation)) $expertConfig->navigation = 8;
if(!isset($expertConfig->countInBlok)) $expertConfig->countInBlok = 3;
if(!isset($expertConfig->formatDate)) $expertConfig->formatDate = 'd.m.Y';
if(!isset($expertConfig->idPage)) $expertConfig->idPage = 'expert';
if(!isset($expertConfig->idUser)) $expertConfig->idUser = 'user';

$expertConfig->blokTemplate = file_exists(Module::pathRun($Config->template, 'expert.blok.template'))?file_get_contents(Module::pathRun($Config->template, 'expert.blok.template')):
'<article class="nblok">
<p style="padding-bottom:0px;"><a href="#uri#">#header#</a></p>
#content#
<p>Категория: <a href="#categoryuri#">#categoryname#</a></p>
</article>';

$expertConfig->prevTemplate = file_exists(Module::pathRun($Config->template, 'expert.prev.template'))?file_get_contents(Module::pathRun($Config->template, 'expert.prev.template')):
'<article class="expert">
<h2><a href="#uri#">#header#</a></h2>
<p class="i"><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p class="t">#date# | Категория: <a href="#categoryuri#">#categoryname#</a> | <a href="#uri#">Подробнее</a></p>
</article>';

$expertConfig->contentTemplate =  file_exists(Module::pathRun($Config->template, 'expert.content.template'))?file_get_contents(Module::pathRun($Config->template, 'expert.content.template')):
'<p><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p>#date# | Категория: <a href="#categoryuri#">#categoryname#</a></p>';

if(!isset($expertConfig->commentTemplate)) $expertConfig->commentTemplate = "<!-- Source Comment -->\r\n";
if(!isset($expertConfig->commentEngine)) $expertConfig->commentEngine = 1;
if(!isset($expertConfig->commentEnable)) $expertConfig->commentEnable = 1;
if(!isset($expertConfig->commentRules)) $expertConfig->commentRules = 1;
if(!isset($expertConfig->commentModeration)) $expertConfig->commentModeration = 1;
if(!isset($expertConfig->commentModerationNumPost)) $expertConfig->commentModerationNumPost = 10;
if(!isset($expertConfig->commentMaxLength)) $expertConfig->commentMaxLength = 1000;
if(!isset($expertConfig->commentNavigation)) $expertConfig->commentNavigation = 100;
if(!isset($expertConfig->commentMaxCount)) $expertConfig->commentMaxCount = 1000;
if(!isset($expertConfig->commentCheckInterval)) $expertConfig->commentCheckInterval = 15000;
if(!isset($expertConfig->cat)) $expertConfig->cat = array();
if(!isset($expertConfig->blokCat)) $expertConfig->blokCat = 0;
if(!isset($expertConfig->indexCat)) $expertConfig->indexCat = 0;
if(!isset($expertConfig->turbo)) $expertConfig->turbo = 0;
if(!isset($expertConfig->turboItems)) $expertConfig->turboItems = 1000;
if(!isset($expertConfig->turboId)) $expertConfig->turboId = 'turbo';
if(!isset($expertConfig->turboCacheTime)) $expertConfig->turboCacheTime = 3600;
if(!isset($expertConfig->custom)) $expertConfig->custom = array();
if(!isset($expertConfig->turboExceptions)) $expertConfig->turboExceptions = 'test1, test2, test3';
?>