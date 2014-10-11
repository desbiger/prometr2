<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}

//	var_dump($arResult);

?>

<script type = "text/javascript">
	$(function(){
		$('div.file_upload').click(function(){
			$('input[type=file]').click();
		})
	});
</script>
<h2>Регистрация мастера</h2>
<table class="new_zayav">
	<tr>
		<td>Ваше имя / название организации</td>
		<td><input type = "text" name="name"/></td>
	</tr>
	<tr>
		<td>Элетронная почта</td>
		<td><input type = "text" name="email"/></td>
	</tr>
	<tr>
		<td>Контактный телефон</td>
		<td><input type = "text" name="phone"/></td>
	</tr>
	<tr>
		<td>Город</td>
		<td>
			<select name = "city" id = "">
				<option value = "1">Москва</option>
				<option value = "2">Дубна</option>
				<option value = "3">Королев</option>
				<option value = "4">Курск</option>
				<option value = "5">Воронеж</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Ваша специализация</td>
		<td>
			<input type = "checkbox" name="razdel" /> <span class="check_name">Архитектура</span> <br/>
			<input type = "checkbox" name="razdel" /> <span class="check_name">Строительство</span><br/>
			<input type = "checkbox" name="razdel" /> <span class="check_name">Ремонт</span><br/>
			<input type = "checkbox" name="razdel" /> <span class="check_name">Стройматериалы</span><br/>
			</select>
		</td>
	</tr>

	<tr>
		<td>О себе</td>
		<td><textarea name = "text" id = "" style="width: 412px; height: 200px;"></textarea></td>
	</tr>
	<tr>
		<td style="vertical-align: middle">Ваше фото / логотип</td>
		<td>
			<div class="file_upload">
			</div>
			<input type = "file" name="logo"/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type = "submit" class="base_button" value="Зерегистрироваться"/></td>
	</tr>

</table>