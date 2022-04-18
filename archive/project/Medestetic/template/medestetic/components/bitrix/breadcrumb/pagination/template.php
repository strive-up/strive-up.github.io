<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

if (empty($arResult)) {
    return '';
}

$res = '<section class="pagination">
			
			<div class="pagination__container">';

$elCount = count($arResult);
foreach ($arResult as $index => $item) {
    $link = (!empty($item['LINK']) && $index < ($elCount - 1)) ? $item['LINK'] : '#';
    $title = $item['TITLE'] ?? '';
    $res .= '<a href="' . $link . '" class="pagination__links">' . $title . '</a>';
}

$res .= '   </div>

		</section>';

return $res;