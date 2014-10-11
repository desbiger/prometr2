<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "регистрация мастера",
	"DESCRIPTION" => "Добавление заявки",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Мои компоненты", // for example "my_project"
		"CHILD" => array(
			"ID" => "master:add", // for example "my_project:services"
			"NAME" => "Регистрация мастера",  // for example "Services"
		),
	),
	"COMPLEX" => "N",
);

?>