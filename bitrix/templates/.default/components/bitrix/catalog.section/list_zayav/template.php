<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!--<pre>--><?//print_r($arResult['ITEMS'])?><!--</pre>-->

<div class="list_zayav">

    <hr>
    <?foreach ($arResult['ITEMS'] as $vol): ?>
    <? $img = CFile::ResizeImageGet($vol['PROPERTIES']['PHOTO']['VALUE'], array("width" => 120, "height" => 300)) ?>
    <div>
<!--        <span style="font-size: 12px;">--><?//=$vol['DATE_CREATE']?><!--</span>-->
        <div class="inside">

            <a class="fancy" href="<?=$vol['DISPLAY_PROPERTIES']['PHOTO']['FILE_VALUE']['SRC']?>">
                <div style="width: 120px; height: 90px; overflow: hidden;"><img src="<?=$img['src']?>"
                                                                                align=""></a></div>
        </div>
        <div class="inside" style="width:450px;">

        <h2><a href="/<?=$_REQUEST['SECTION_CODE']?>/<?=$vol['ID']?>/"><?=$vol['NAME']?>
            (<?=$vol['PROPERTIES']['PRICE']['VALUE']?>)
        </a></h2>


            <?=substr($vol['PREVIEW_TEXT'], 0, 100)?>...<br><br>
            <strong style="font-weight: bold; color: #26AB30;">Дата размещения:
            </strong><?=str_replace(" ","&nbsp&nbsp&nbsp",$vol['DATE_CREATE'])?>
        </div>
    </div>
    <hr>
    <? endforeach?>
</div>
