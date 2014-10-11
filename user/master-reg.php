<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация мастеров");
?><?$APPLICATION->IncludeComponent(
	"sakharov:master.reg",
	"",
	Array(
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>