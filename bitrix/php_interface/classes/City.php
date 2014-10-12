<?

	class City
	{
		protected $iblock_id = 8;
		protected $city;

		static function factory($city_id = null)
		{

			return new City($city_id);
		}

		function City($city_id)
		{
			if ($city_id) {
				CModule::IncludeModule('iblock');
				$c          = CIBlockELement::GetByID($city_id)
						->Fetch();
				$this->city = $c;
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
	}
 