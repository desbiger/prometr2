<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Отклик на объявление",
	"DESCRIPTION" => "Ответ на поданое объявление",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Отклики", // for example "my_project"
		"CHILD" => array(
			"ID" => "post.ancer", // for example "my_project:services"
			"NAME" => "Отклик на объявление",  // for example "Services"
		),
	),
	"COMPLEX" => "N",
);

?>