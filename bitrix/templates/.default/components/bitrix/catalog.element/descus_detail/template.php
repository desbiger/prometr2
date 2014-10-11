<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}


?>
<!--<pre>--><? //print_r($arResult)?><!-- <pre>-->
<div class = "list_zayav">
	<h2><?= $arResult['NAME'] ?></h2>Размещено: <?= $arResult['DATE_CREATE'] ?>
	<hr>
	<? if ($arResult['PROPERTIES']['PHOTO']['VALUE']): ?>
		<? $img = CFile::ResizeImageGet($arResult['PROPERTIES']['PHOTO']['VALUE'], array(
				"width" => 200,
				"height" => 200
		)) ?>
	<? else: ?>
		<? $img['src'] = Section::factory($arResult['IBLOCK_SECTION_ID'])
				->GetPicture() ?>
	<?endif ?>
	<div class = "img">
		<? if ($arResult['PROPERTIES']['PHOTO']['VALUE']): ?>
			<a class = "fancy" href = "<?= CFile::GetPath($arResult['PROPERTIES']['PHOTO']['VALUE']) ?>">
				<img src = "<?= $img['src'] ?>"/>
			</a>
		<? else: ?>
			<img src = "<?= $img['src'] ?>"/>
		<?endif ?>
	</div>
	<? foreach ($arResult['PROPERTIES'] as $key => $value): ?>
		<? if ($value['VALUE'] != '' && $key != "PHOTO"): ?>
			<b><?= $value['NAME'] ?>:</b> <? if ($key == "USER") {
				$res = CUser::GetByID($value['VALUE']);
				$us  = $res->Fetch();
				echo $us['LOGIN'];
			}
			else {
				echo $value['NAME'] == 'Стоимость' ? $value['VALUE'] ." руб" :$value['VALUE'];
			}
			?><br>
		<? endif ?>
	<? endforeach ?>
	<br>
	<b>Описание заявки:</b>
	<?= $arResult['DETAIL_TEXT'] ?>
</div>
<hr>