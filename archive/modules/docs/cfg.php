<?php
if (!isset($Config)) global $Config;
$docsStorage = new EngineStorage('module.docs2');
if($docsStorage->iss('docsConfig')){
	$docsConfig = json_decode($docsStorage->get('docsConfig'));
}
if(!isset($docsConfig)){
	$docsConfig = new stdClass();
}
// Настройки поумолчанию
if(!isset($docsConfig->navigation)) $docsConfig->navigation = 8;
if(!isset($docsConfig->countInBlok)) $docsConfig->countInBlok = 3;
if(!isset($docsConfig->formatDate)) $docsConfig->formatDate = 'd.m.Y';
if(!isset($docsConfig->idPage)) $docsConfig->idPage = 'docs';
if(!isset($docsConfig->idUser)) $docsConfig->idUser = 'user';

$docsConfig->blokTemplate = file_exists(Module::pathRun($Config->template, 'docs.blok.template'))?file_get_contents(Module::pathRun($Config->template, 'docs.blok.template')):
'<article class="nblok">
<p style="padding-bottom:0px;"><a href="#uri#">#header#</a></p>
#content#
<p>Категория: <a href="#categoryuri#">#categoryname#</a></p>
</article>';

$docsConfig->prevTemplate = file_exists(Module::pathRun($Config->template, 'docs.prev.template'))?file_get_contents(Module::pathRun($Config->template, 'docs.prev.template')):
'<article class="docs">
<h2><a href="#uri#">#header#</a></h2>
<p class="i"><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p class="t">#date# | Категория: <a href="#categoryuri#">#categoryname#</a> | <a href="#uri#">Подробнее</a></p>
</article>';

$docsConfig->contentTemplate =  file_exists(Module::pathRun($Config->template, 'docs.content.template'))?file_get_contents(Module::pathRun($Config->template, 'docs.content.template')):
'<p><img src="#img#" alt="" style="width: 100%;"></p>
#content#
<p>#date# | Категория: <a href="#categoryuri#">#categoryname#</a></p>';

if(!isset($docsConfig->commentTemplate)) $docsConfig->commentTemplate = "<!-- Source Comment -->\r\n";
if(!isset($docsConfig->commentEngine)) $docsConfig->commentEngine = 1;
if(!isset($docsConfig->commentEnable)) $docsConfig->commentEnable = 1;
if(!isset($docsConfig->commentRules)) $docsConfig->commentRules = 1;
if(!isset($docsConfig->commentModeration)) $docsConfig->commentModeration = 1;
if(!isset($docsConfig->commentModerationNumPost)) $docsConfig->commentModerationNumPost = 10;
if(!isset($docsConfig->commentMaxLength)) $docsConfig->commentMaxLength = 1000;
if(!isset($docsConfig->commentNavigation)) $docsConfig->commentNavigation = 100;
if(!isset($docsConfig->commentMaxCount)) $docsConfig->commentMaxCount = 1000;
if(!isset($docsConfig->commentCheckInterval)) $docsConfig->commentCheckInterval = 15000;
if(!isset($docsConfig->cat)) $docsConfig->cat = array();
if(!isset($docsConfig->blokCat)) $docsConfig->blokCat = 0;
if(!isset($docsConfig->indexCat)) $docsConfig->indexCat = 0;
if(!isset($docsConfig->turbo)) $docsConfig->turbo = 0;
if(!isset($docsConfig->turboItems)) $docsConfig->turboItems = 1000;
if(!isset($docsConfig->turboId)) $docsConfig->turboId = 'turbo';
if(!isset($docsConfig->turboCacheTime)) $docsConfig->turboCacheTime = 3600;
if(!isset($docsConfig->custom)) $docsConfig->custom = array();
if(!isset($docsConfig->turboExceptions)) $docsConfig->turboExceptions = 'test1, test2, test3';
?>