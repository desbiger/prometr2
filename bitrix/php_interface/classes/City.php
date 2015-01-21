<?

	class City
	{
		protected $iblock_id = 8;
		protected $city;
		protected $DB;

		static function factory($city_id = null)
		{
			return new City($city_id);
		}


		function City($city_id)
		{
			$this->DB = $GLOBALS['DB'];
			if($city_id){
				$t        = $this->DB->Query('SELECT * FROM city WHERE city.`city_id` = ' . $city_id);
				while ($res = $t->Fetch()) {
					$this->city['NAME'] = $res['name'];
				}
			}

		}

		function __toString()
		{
			return $this->city['NAME'] ? $this->city['NAME'] : 'Не выбран город';
		}

		function GetList()
		{
			CModule::IncludeModule('iblock');
			$result = array();
			$r      = CIBlockElement::GetList(array('NAME' => 'ASC'), array('IBLOCK_ID' => $this->iblock_id));
			while ($t = $r->Fetch()) {
				$result[$t['ID']] = $t['NAME'];
			}
			return $result;
		}

		function GetRegions()
		{
			$result = array();
			$t      = $this->DB->Query('SELECT * FROM region WHERE region.`country_id` = 3159');
			while ($res = $t->Fetch()) {
				$result[] = $res;
			}
			return $result;
		}

		function GetCitysByRegion($region_id)
		{
			$result = array();
			$t      = $this->DB->Query('SELECT * FROM city WHERE city.`region_id` = ' . $region_id);
			while ($res = $t->Fetch()) {
				$result[] = $res;
			}
			return $result;
		}

		static function ToSelect($array, $value_field, $name_field, $select_name, $attributes = null)
		{

			$str = '<select name="' . $select_name . '" ' . $attributes . '>';
			foreach ($array as $vol) {
				$str .= "<option value='" . $vol[$value_field] . "'>" . $vol[$name_field] . "</option>";
			}
			$str .= '</select>';
			return $str;
		}
	}
 