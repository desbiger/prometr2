<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="masters">
    <!--    <pre>--><?//print_r($arResult['ITEMS'])?><!--</pre>-->
    <?foreach ($arResult['ITEMS'] as $vol): ?>
    <? $img = CFile::ResizeImageGet($vol['DETAIL_PICTURE']['ID'], array('width' => 200, 'height' => 200)) ?>
    <div class="master">
        <h3><?=$vol['NAME']?></h3>

        <div class="master_img">
            <a target="_new" href="/masters/<?=$vol['CODE']?>/"><img src="<?=$img['src']?>"/></a>
        </div>
    </div>
    <? endforeach?>
</div>
