<h2>Личные данные</h2>


<table>
	<tr>
		<td>Имя:</td>
		<td><?=Form::input('NAME', 'text', $user['NAME'])?></td>
	</tr>
	<tr>
		<td>Фамилия:</td>
		<td><?=Form::input('LAST_NAME', 'text', $user['LAST_NAME'])?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?=Form::input('EMAIL', 'text', $user['EMAIL'])?><br></td>
	</tr>
	<tr>
		<td>Аватар:</td>
		<td>
                  <?if ($arResult['USER']['PERSONAL_PHOTO'] != ''): ?>
                  <? $ava = CFile::ResizeImageGet($arResult['USER']['PERSONAL_PHOTO'], array('width' => 128, 'height' => 128)) ?>
			<a href="<?=CFile::GetPath($arResult['USER']['PERSONAL_PHOTO'])?>" class="fancy"><img src="<?=$ava['src']?>"
			                                                                                      accesskey=""></a>
                  <? else: ?>
			<img src="/bitrix/templates/index/img/noimage.jpg">
                  <?endif?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><?=Form::input('PHOTO', 'file')?></td>
	</tr>
	<tr>
		<td><input type="submit" value="Применить"><br></td>
	</tr>

</table>