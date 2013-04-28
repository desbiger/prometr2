<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Тема оформления страницы",
	"DESCRIPTION" => "Получает CSS код темы для страниы пользователя",
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