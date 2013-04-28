<h2>Настройки личной страницы мастера</h2>
<input type="hidden" name="master_id" value="<?=$arResult['MASTER']['ID']?>">
<input type="hidden" name="master_user" value="<?=$arResult['USER']['ID']?>">
<table>
	<tr>
		<td>Имя мастера:</td>
		<td><?=Form::input('MASTER_NAME', 'text', $arResult['MASTER']['NAME'])?></td>
	</tr>
	<tr>
		<td>Род деятельности мастера:</td>
		<td><?=Form::select('RAZDEL', $arResult['RAZDELS'], $arResult['MASTER']['PROP']['RAZDEL'][0])?></td>
	</tr>
	<tr>
		<td>Аватар:</td>
		<td>
            <?if ($arResult['MASTER']['DETAIL_PICTURE']['ID'] != ''): ?>
            <? $master_ava = CFile::ResizeImageGet($arResult['MASTER']['DETAIL_PICTURE'], array('width' => 140, 'height' => 140)) ?>
			<img id="master_ava" src="<?=$master_ava['src']?>">
            <? else: ?>
			<img id="master_ava" src="/bitrix/templates/index/img/noimage.jpg">
            <? endif?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="file" name="master_ava" id="file_content">
        </td>
	</tr>
	<tr>
		<td>О себе:</td>
		<td><textarea id="textarea" name="about_master"><?=$arResult['MASTER']['DETAIL_TEXT']?></textarea></td>
	</tr>

	<tr>
		<td>
			<input type="submit" value="Применить">
		</td>
	</tr>
</table>