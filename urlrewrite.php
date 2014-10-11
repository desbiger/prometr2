<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/user/cabinet/.*#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/user/personal.php",
	),
	array(
		"CONDITION" => "#^/(.*)/(.*)/.*#",
		"RULE" => "SECTION_CODE=\$1&ELEMENT_ID=\$2",
		"ID" => "",
		"PATH" => "/razdely/detail.php",
	),
	array(
		"CONDITION" => "#^/(.*)/.*#",
		"RULE" => "SECTION_CODE=\$1",
		"ID" => "",
		"PATH" => "/razdely/index.php",
	),
);

?>