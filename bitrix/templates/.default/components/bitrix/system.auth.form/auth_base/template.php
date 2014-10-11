<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>
<? if ($USER->GetLogin() == ''): ?>
	<div class = "form_reg">
		<div class = "reg_content">
			<form method = "post">
				<input type = "hidden" name = "AUTH_FORM" value = "Y"/>
				<input type = "hidden" name = "TYPE" value = "AUTH"/>
				E-mail: <input type = "text" name = "USER_LOGIN" maxlength = "50" value = "<?= $arResult["USER_LOGIN"] ?>" size = "17"/>
				Пароль: <input type = "password" name = "USER_PASSWORD" maxlength = "50" size = "17"/>
				<input type = "submit" value = "Войти">
				<a class = "pass_a" href = "/">Забыли пароль?</a>
				<a class = "reg_a" href = "/user/reg.php?backurl=/user/cabinet/">Регистрация</a>
			</form>
		</div>
		<div class = "re">
			<input type = "button" class="base_button" value = "Подать заявку"/>
		</div>
	</div>
<? else: ?>
	<div class = "form_reg">
		<div class = "reg_content">
			<!--			<div class = "user_menu">-->
			<!--				--><? //$APPLICATION->IncludeComponent("sakharov:user_page.change.theme", "", Array(
				//						"IBLOCK_TYPE" => "news",
				//						"IBLOCK_ID" => $_REQUEST["ID"],
				//						"ITEMS_LIMIT" => "10",
				//						"ELEMENT_ID_CONNECT" => $_REQUEST["ELEMENT_ID"],
				//						"PROPERTY_CODE" => "EXT_ID"
				//				), false);
			?>
			<!--			</div>-->

			<div class = "name">
				<div class = "user_panel_m2">
					<a href = '/user/cabinet/'>Личный кабинет</a>
					<a href = "?logout=yes">
						<img src = "/bitrix/templates/index/img/door_in_8796.png">
						Выйти</a>
				</div>

				<div class = "User_name">
					<?= $USER->GetLogin() ?>, добро пожаловать!
				</div>

			</div>

		</div>
		<div class = "re">
			<input type = "button" class="base_button" value = "Подать заявку"/>
		</div>


	</div>
<?endif ?>