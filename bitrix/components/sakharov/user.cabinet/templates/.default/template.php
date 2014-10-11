<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
?>
<script type = "text/javascript" src = "/bitrix/templates/index/js/jquery.form.js"></script>
<script type = "text/javascript">
	$(function () {
		$('#file_content').change(function () {
			{
				$('#myForm').ajaxForm();
				$("#myForm").ajaxSubmit({
					url: '/ajax/load_avatar.php',
					iframe: true,
					dataType: null,
					beforeSubmit: function (arr, $form, options) {
						$("#master_ava").attr('src', "/bitrix/templates/index/img/loading9.gif");
					},
					success: function (data) {
						$("#master_ava").attr('src', data);
					}
				});
			}
		});
	});
</script>
<!--    <pre>--><? //print_r($_SERVER)?><!--</pre>-->
<!--<pre>--><? //print_r($arResult['POST'])?><!--</pre>-->
<? $user = $USER->GetByID($USER->GetID())
		->Fetch() ?>

<?
	$ga = CIBlockElement::GetList(null, array(
			'IBLOCK_ID' => 7,
			'PROPERTY_USER' => $user['ID']
	));
	$gallerys = array();
	while ($t = $ga->GetNextElement()) {
		$element          = $t->GetFields();
		$element['PROPS'] = $t->GetProperties();
		$gallerys[]       = $element;
	}
?>
<!--<pre>--><? //print_r($user)?><!--</pre>-->
<div class = "stro header_block">Личный кабинет</div>
<div class = "cabinet_div">


	<ul class = "top_menu">

		<li class = "current">Личные данные</li>
		<li>Фотогалереи</li>


		<li>Сообщения</li>
		<li>Финансы</li>

	</ul>

	<div class = "box visible">


		<form id = "myForm" method = "post" enctype = "multipart/form-data">
			<table class = "new_zayav">
				<tr>
					<td>Логин</td>
					<td><input type = "test" name = "LOGIN" value = "<?= $user['LOGIN'] ?>"/></td>
				</tr>
				<tr>
					<td> Имя</td>
					<td><input type = "test" name = "NAME" value = "<?= $user['NAME'] ?>"/></td>
				</tr>
				<tr>
					<td>Фамилия</td>
					<td><input type = "test" name = "LAST_NAME" value = "<?= $user['LAST_NAME'] ?>"/></td>
				</tr>
				<tr>
					<td>Отчество</td>
					<td><input type = "test" name = "SECOND_NAME" value = "<?= $user['SECOND_NAME'] ?>"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type = "test" name = "EMAIL" value = "<?= $user['EMAIL'] ?>"/></td>
				</tr>
				<tr>
					<td>О себе</td>
					<td>
						<textarea name = "text" id = "" cols = "30" rows = "10"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type = "submit" value = "Сохранить"/></td>
				</tr>
			</table>
		</form>

	</div>
	<div class = "box">
		<!--		<pre>--><? //print_r($gallerys)?><!--</pre>-->
		<? if (count($gallerys)): ?>
			<? foreach ($gallerys as $g): ?>
				<div class = "gallery">
					<h2><?= $g['NAME'] ?></h2>
					<? foreach ($g['PROPS']['PHOTOS']['VALUE'] as $photo): ?>
						<? $img = CFile::ResizeImageGet($photo, array(
								'width' => 100,
								'height' => 100
						), BX_RESIZE_IMAGE_EXACT);
						$big_img = CFile::GetPath($photo)?>
						<a rel="rel" class="fancy" href = "<?= $big_img ?>">
							<img src = "<?= $img['src'] ?>" alt = ""/>
						</a>
					<? endforeach ?>
				</div>
			<? endforeach ?>
		<? endif ?>
	</div>
	<div class = "box">
		234
	</div>
	<div class = "box">
		345
	</div>
</div>