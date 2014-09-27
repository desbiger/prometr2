<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<!--<pre>--><? //print_r($arResult)?><!--</pre>-->
<? $img = CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array(
		'width' => 200,
		'height' => 200
)) ?>
<div class = "personal_page">
	<h2><?= $arResult['NAME'] ?></h2>
	<hr>
	<div class = "header">
		<div class = "about_me">
			<a class = "fancy" href = "<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"><img class = "detail_img"
			                                                                           src = "<?= $img['src'] ?>"/></a>
			<?= $arResult['DETAIL_TEXT'] ?>
		</div>
	</div>
	<? if (count($arResult['PROPERTIES']['PORTFOLIIO']['VALUE']) > 0): ?>
		<?
		$Filter = array(
				"IBLOCK_ID" => 7,
				"ID" => $arResult['PROPERTIES']['PORTFOLIIO']['VALUE'][0],
		);
		$select = array(
				"NAME",
				"ID",
				"PROPERTY_FILES",
		);
		$temp   = CIBlockElement::GetList(null, $Filter, null, null);
		while ($t = $temp->GetNextElement()) {
			$element               = '';
			$element               = $t->GetFields();
			$element['PROPERTIES'] = $t->GetProperties();
			if (count($element['PROPERTIES']['FILES']['VALUE'] > 0)) {
				$real_img  = '';
				$small_img = '';
				foreach ($element['PROPERTIES']['FILES']['VALUE'] as $images) {
					$real_img[]  = CFile::GetPath($images);
					$small_img[] = CFile::ResizeImageGet($images, array(
							'width' => 200,
							'height' => 200
					));
				}
				$element['PROPERTIES']['FILES']['VALUE']       = $real_img;
				$element['PROPERTIES']['FILES']['SMALL_VALUE'] = $small_img;
				$gallery[]                                     = $element;
			}

		}
		?>
		<!--    <pre>--><? //print_r($gallery)?><!--</pre>-->
		<br>
		<br>
		<div style = "display: block; clear:both;"></div>
		<h2><?= $element['NAME'] ?></h2>
		<? foreach ($gallery[0]['PROPERTIES']['FILES']['VALUE'] as $key => $vol): ?>
			<div class = "gallery_img">
				<a class = "fancy" rel = "once" href = "<?= $vol ?>"><img
							src = "<?= $gallery[0]['PROPERTIES']['FILES']['SMALL_VALUE'][$key]['src'] ?>"
							alt = ""></a>
			</div>
		<? endforeach ?>
	<? endif ?>
</div>
