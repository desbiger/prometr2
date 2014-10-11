<?

	class City
	{
		protected $iblock_id = 8;

		static function factory()
		{

			return new City();
		}

		function City()
		{

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
 