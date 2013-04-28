<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Все галереи",
	"DESCRIPTION" => "Выводит список всех галерей",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Sakharov", // for example "my_project"
		"CHILD" => array(
			"ID" => "sakharov: user", // for example "my_project:services"
			"NAME" => 'Пользователь',  // for example "Services"
		),
	),
	"COMPLEX" => "N",
);

?>
