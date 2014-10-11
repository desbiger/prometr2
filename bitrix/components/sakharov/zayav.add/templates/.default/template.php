<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}

//	var_dump($arResult);

?>
<h2>Подача заявки</h2>
<table class="new_zayav">
	<tr>
		<td>Ваше имя</td>
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
		<td>Раздел</td>
		<td>
			<select name = "city" id = "">
				<option value = "1">Архитектура</option>
				<option value = "2">Строительство</option>
				<option value = "3">Ремонт</option>
				<option value = "4">Стройматериалы</option>
			</select>
		</td>
	</tr>

	<tr>
		<td>Заголовок заявки</td>
		<td><input type = "text" style="width: 412px"/></td>
	</tr>
	<tr>
		<td>Текст заявки</td>
		<td><textarea name = "text" id = "" style="width: 412px; height: 200px;"></textarea></td>
	</tr>
	<tr>
		<td>Предположительная стоимость</td>
		<td><input type = "text" name = "price" style="width: 75px"/> руб.</td>
	</tr>
	<tr>
		<td></td>
		<td><input class="base_button" type = "submit" value="Соханить"/></td>
	</tr>
</table>