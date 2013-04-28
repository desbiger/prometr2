<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Список тем для смены",
	"DESCRIPTION" => "Меняет тему оформления страницы пользователя",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Sakharov", // for example "my_project"
		"CHILD" => array(
			"ID" => "sakharov: theme", // for example "my_project:services"
			"NAME" => 'Темы',  // for example "Services"
		),
	),
	"COMPLEX" => "N",
);

?>