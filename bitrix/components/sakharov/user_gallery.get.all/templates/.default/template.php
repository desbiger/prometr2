<?
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<!--<pre style="color: white;">--><?//print_r($arResult)?><!--</pre>-->
        <pre style="color: #ffffff;"><?print_r($_REQUEST)?></pre>
<div class="themes">
	<form action="" method="post">
        <?foreach ($arResult['ITEMS'] as $vol): ?>
		<div class="theme">
			<h2><?=$vol['NAME']?></h2>
		</div>
		<input type="checkbox" value="<?=$vol['ID']?>" <?=$_REQUEST['theme'] == $vol['ID']? 'checked="checked"':null?> name="theme[]">
        <? endforeach?><br>
        <input type="submit" value="Применить тему">
	</form>
</div>
