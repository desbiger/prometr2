<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$images = array(
	'5' => '/upload/iblock/ad5/ad56b03444c36cb4ad93d3f2bb9f2463.jpg',
	'6' => '/upload/iblock/f8d/f8d5f33b1b5df9f27b67006e7852eb2c.jpg',
	'7' => '/upload/iblock/7b0/7b0e6a413c0d3771788687251036a02b.jpg',
	'8' => '/upload/iblock/1aa/1aa43201338bc95751635375fd0f125a.jpg',
);
?>
<!--<pre>--><?//print_r($arResult)?><!-- <pre>-->
<div class = "list_zayav">
	<h2><?=$arResult['NAME']?></h2>Размещено: <?=$arResult['DATE_CREATE']?>
	<hr>
	<?if ($arResult['PROPERTIES']['PHOTO']['VALUE'] != ''): ?>
		<? $img = CFile::ResizeImageGet($arResult['PROPERTIES']['PHOTO']['VALUE'], array(
			"width" => 200,
			"height" => 200
		)) ?>
	<? else: ?>
		<? $img['src'] = $images[$arResult['IBLOCK_SECTION_ID']] ?>
	<?endif?>
	<div class = "img">
		<a class = "fancy" href = "<?= CFile::GetPath($arResult['PROPERTIES']['PHOTO']['VALUE']) ?>"><img src = "<?= $img['src'] ?>"/></a>
	</div>
	<? foreach ($arResult['PROPERTIES'] as $key => $value): ?>
		<? if ($value['VALUE'] != '' && $key != "PHOTO"): ?>
			<b><?= $value['NAME'] ?>:</b> <? if ($key == "USER") {
				$res = CUser::GetByID($value['VALUE']);
				$us  = $res->Fetch();
				echo $us['LOGIN'];
			}
			else {
				echo $value['VALUE'];
			}
			?><br>
		<? endif ?>
	<? endforeach ?>
	<br>
	<b>Описание заявки:</b>
	<?=$arResult['PREVIEW_TEXT']?>

</div>
<hr>