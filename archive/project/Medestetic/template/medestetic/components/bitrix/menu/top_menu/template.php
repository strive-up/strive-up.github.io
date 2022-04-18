<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if(!empty($arResult)): ?>

<div class="nav__menu">

	<?php foreach($arResult as $item): ?>

		<li class="menu__item">

			<a href="<?= $item['LINK'] ?>" <?= $item["SELECTED"] ? 'class="menu__item--active"' : ''; ?>><?= $item['TEXT'] ?></a>

			<?php if (!empty($item['subitems'])): ?>

				<div class="menu__item__list">

					<?php foreach ($item['subitems'] as $subitem): ?>
						<a href="<?= $subitem['LINK']; ?>" class="item__list <?= $subitem["SELECTED"] ? 'menu__item--active' : ''; ?>"><?= $subitem['TEXT'] ?? ''; ?></a>
					<?php endforeach; ?>

				</div>

			<?php endif; ?>

		</li>

	<?php endforeach; ?>

</div>

<?php endif; ?>