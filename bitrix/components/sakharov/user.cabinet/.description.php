<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Личный кабинет",
	"DESCRIPTION" => "Настройки пользователя, вывод сообщений, обращение в тех поддержку",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Мои модули", // for example "my_project"
		"CHILD" => array(
			"ID" => "sakharov: user", // for example "my_project:services"
			"NAME" => 'Пользователь',  // for example "Services"
		),
	),
	"COMPLEX" => "N",
);

?>