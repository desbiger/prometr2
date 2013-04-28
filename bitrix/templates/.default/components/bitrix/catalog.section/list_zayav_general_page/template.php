<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!--<pre>--><?//print_r($arResult['ITEMS'])?><!--</pre>-->
<?foreach ($arResult['ITEMS'] as $vol) {
    if ($vol['IBLOCK_SECTION_ID'] == 5) {
        $stroy[] = $vol;
    } elseif ($vol['IBLOCK_SECTION_ID'] == 6) {
        $rem[] = $vol;
    } elseif ($vol['IBLOCK_SECTION_ID'] == 7) {
        $arch[] = $vol;
    } elseif ($vol['IBLOCK_SECTION_ID'] == 8) {
        $des[] = $vol;
    }
}
    function template_print($var)
    {
        ?>
    <? foreach ($var as $vol): ?>
    <?$temp = CIBlockSection::GetByID($vol['IBLOCK_SECTION_ID']);
        $section = $temp->GetNext();?>
    <? $img = CFile::ResizeImageGet($vol['PROPERTIES']['PHOTO']['VALUE'], array("width" => 120, "height" => 300)) ?>
	<div>
		<div class="inside">

			<a class="fancy" href="<?=CFile::GetPath($vol['PROPERTIES']['PHOTO']['VALUE'])?>">
				<div style="width: 120px; height: 90px; overflow: hidden;">
					<img src="<?=$img['src']?>" align="">
				</div>
			</a>
		</div>
		<div class="inside" style="width:460px;">

			<h2><a href="<?=$section['CODE']?>/<?=$vol['ID']?>/"><?=$vol['NAME']?>
                <?=$vol['PROPERTIES']['PRICE']['VALUE'] != '' ? "(" . $vol['PROPERTIES']['PRICE']['VALUE'] . ")" : ""?>
			</a></h2>
            <?=substr($vol['PREVIEW_TEXT'], 0, 100)?>...<br><br>
			<strong style="font-weight: bold; color: #26AB30;">Дата размещения:
			</strong><?=str_replace(" ", "&nbsp&nbsp&nbsp", $vol['DATE_CREATE'])?>
		</div>
	</div>

	<hr>
    <? endforeach ?>
    <?
    }

?>
<div class="list_zayav">
	<h2>Последние заявки</h2>

	<div class="stro header_block">СТРОИТЕЛЬСТВО</div>
	<hr>
    <?template_print($stroy)?>
	<div class="rem header_block">РЕМОНТ</div>
	<hr>
    <?template_print($rem)?>
	<div class="arhitect  header_block">АРХИТЕКУТРА И ДИЗАЙН</div>
	<hr>
    <?template_print($arch)?>
	<div class="mat header_block">СТРОЙМАТЕРИАЛЫ</div>
	<hr>
    <?template_print($des)?>

</div>
