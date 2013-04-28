<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<!--    <pre>--><?//print_r($arResult)?><!--</pre>-->
<div class="ancers">
	<h2>Отклики мастеров:</h2><br>
    <?if (count($arResult['ITEMS']) > 0): ?>
    <? foreach ($arResult['ITEMS'] as $vol): ?>
		<div class="item">
			<div style=" float:left; width: 150px; height: 100px; border-right: 1px dotted #808080;">
				<span><?=$vol['DATE_CREATE']?></span><br>
				<a target="" href="<?=$vol['USER']['PAGE_URL']?>">
                    <?=$vol['USER']['NAME'] != '' ? $vol['USER']['NAME'] : $vol['USER']['LOGIN'] ?>
				</a><br>

				<div class="user_ava">
                    <?if ($vol['USER']['PERSONAL_PHOTO'] != ''): ?>
					123
                    <? else: ?>
					<img src="/bitrix/templates/index/img/noimage.jpg" class="">
                    <?endif?>
				</div>
			</div>
			<div style="float: left;">
                <?=$vol['PREVIEW_TEXT']?>
			</div>
		</div>
        <? endforeach ?>
    <? endif?>
    <?if ($USER->GetID() != ''): ?>
	<div class="post">
		<form action="" method="post" enctype="multipart/form-data">
			Откликнуться на заказ:<br>
			<input type="hidden" name="backUrl" value="<?=$_SERVER['REQUEST_URI']?>">
			<textarea rows="5" style="width: 100%" name="ancer_text"></textarea><br><br>
			<input type="submit" value="Откликнуться">
		</form>
	</div>
    <? else: ?>
	Необходимо <a href="/user//reg.php">зарегистрироваться</a> на сайте что бы оставить отклик
    <?endif?>
</div>