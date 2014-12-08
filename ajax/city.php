<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
	if ($_GET['region_id']) {
		$citys = City::factory()
				->GetCitysByRegion($_GET['region_id']);
		echo City::ToSelect($citys, 'city_id', 'name', 'city_id');
	}
 