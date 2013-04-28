<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!--    <pre>--><?//print_r($arResult['SECTIONS'])?><!--</pre>-->
<ul class="top_menu">
    <?foreach ($arResult['SECTIONS'] as $vol): ?>
    <li class="<?=$vol['UF_KLASS']?>">
<!--        <img src="--><?//=$vol['PICTURE']['SRC']?><!--"/>-->
        <a href="<?=$vol['SECTION_PAGE_URL']?>"><?=$vol['NAME']?></a>
        <span></span>
    </li>
    <? endforeach?>
</ul>

