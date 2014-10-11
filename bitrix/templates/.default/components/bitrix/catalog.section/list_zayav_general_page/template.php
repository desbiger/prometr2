<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<!--<pre>--><? // print_r($arResult) ?><!--</pre>-->
<?foreach ($arResult['ITEMS'] as $vol) {
	if ($vol['IBLOCK_SECTION_ID'] == 6) {
		$rem[] = $vol;
	}
	elseif ($vol['IBLOCK_SECTION_ID'] == 5) {
		$stroy[] = $vol;
	}
	elseif ($vol['IBLOCK_SECTION_ID'] == 7) {
		$arch[] = $vol;
	}
	elseif ($vol['IBLOCK_SECTION_ID'] == 8) {
		$des[] = $vol;
	}
}

	function template_print($var)
	{
		$images = array(
				'5' => '/upload/iblock/ad5/ad56b03444c36cb4ad93d3f2bb9f2463.jpg',
				'6' => '/upload/iblock/f8d/f8d5f33b1b5df9f27b67006e7852eb2c.jpg',
				'7' => '/upload/iblock/7b0/7b0e6a413c0d3771788687251036a02b.jpg',
				'8' => '/upload/iblock/1aa/1aa43201338bc95751635375fd0f125a.jpg',
		);
		$i      = 0;
		?>
		<? foreach ($var as $vol): ?>
		<? if ($i++ < 5): ?>
			<?$temp  = CIBlockSection::GetByID($vol['IBLOCK_SECTION_ID']);
			$section = $temp->GetNext();?>
			<?
			if ($vol['PROPERTIES']['PHOTO']['VALUE']) {
				$img = CFile::ResizeImageGet($vol['PROPERTIES']['PHOTO']['VALUE'], array(
						"width" => 120,
						"height" => 120
				),BX_RESIZE_IMAGE_EXACT);
			}
			else {
				$pic = GetSectionImage($vol['IBLOCK_SECTION_ID']);
				$img = CFile::ResizeImageGet($pic, array(
						'width' => 120,
						'height' => 300
				));
			};


			?>

			<div>
				<div class = "inside">

					<? if (CFile::GetPath($vol['PROPERTIES']['PHOTO']['VALUE'])): ?>
						<a class = "fancy" href = "<?= CFile::GetPath($vol['PROPERTIES']['PHOTO']['VALUE']) ?>">
							<div style = "width: 120px; height: 90px; overflow: hidden;">
								<img src = "<?= $img['src'] ? $img['src'] : "/bitrix/templates/index/img/noimage.jpg" ?>" align = "">
							</div>
						</a>
					<? else: ?>
						<div style = "width: 120px; height: 90px; overflow: hidden;">
							<img src = "<?= $img['src'] ? $img['src'] : "/bitrix/templates/index/img/noimage.jpg" ?>" align = "">
						</div>
					<?endif ?>
				</div>
				<div class = "inside" style = "width:460px;">

					<h2>
						<a href = "<?= $section['CODE'] ?>/<?= $vol['ID'] ?>/">
							<?= $vol['NAME'] ?> <?= $vol['PROPERTIES']['PRICE']['VALUE'] != '' ? "(" . $vol['PROPERTIES']['PRICE']['VALUE'] . " руб.)" : "" ?>
						</a>
					</h2>
					<?= substr($vol['PREVIEW_TEXT'], 0, 100) ?>...<br><br>
					<strong style = "font-weight: bold; color: #26AB30;">Дата размещения:
					</strong><?= str_replace(" ", "&nbsp&nbsp&nbsp", $vol['DATE_CREATE']) ?>
				</div>
			</div>

			<hr>
		<? endif ?>
	<? endforeach ?>
	<?
	}

?>
<div class = "list_zayav">
	<h2>Последние заявки</h2>

	<div class = "rem header_block">РЕМОНТ</div>
	<hr>
	<? template_print($rem) ?>
	<div class = "stro header_block">СТРОИТЕЛЬСТВО</div>
	<hr>
	<? template_print($stroy) ?>
	<div class = "arhitect  header_block">АРХИТЕКУТРА И ДИЗАЙН</div>
	<hr>
	<? template_print($arch) ?>
	<div class = "mat header_block">СТРОЙМАТЕРИАЛЫ</div>
	<hr>
	<? template_print($des) ?>

</div>
