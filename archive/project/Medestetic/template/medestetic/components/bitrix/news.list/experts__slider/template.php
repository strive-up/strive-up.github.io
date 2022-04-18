<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>

<?php if(!empty($arResult['ITEMS'])): ?>

<section class="content content__slider">

	<div class="content__container">

		<div class="content__header">H2 Наши специалист</div>

			<div class="experts__wrapper">

				<div class="owl-carousel">

					<?foreach($arResult["ITEMS"] as $arItem):?>

						<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						
						<div class="experts__body" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

							<?php if(!empty($arItem['DISPLAY_PROPERTIES']['experts__images']['FILE_VALUE']['SRC'])): ?>

								<div class="experts__images">
									<img src="<?= $arItem['DISPLAY_PROPERTIES']['experts__images']['FILE_VALUE']['SRC']; ?>" alt="">
								</div>

							<?php endif; ?>
						
							<div class="experts__name"><?= isset($arItem['NAME']) ? $arItem['NAME'] : ''; ?></div>

							<?php if(!empty($arItem['PROPERTIES']['experts__spec']['VALUE'])): ?>

								<div class="experts__spec"><?= $arItem['PROPERTIES']['experts__spec']['VALUE']; ?></div>

							<?php endif; ?>

							<button class="btn btn--purple" data-path="first" data-animation="fade" data-speed="300">Записаться на прием</button>                                
			
						</div>

					<?endforeach;?>

				</div>

			</div>

		</div>
		
	</div>

</section>

<?php endif; ?>