<?

	class Section
	{
		public $section;
		public $iblock_id = 5;

		static function factory($section_id = null)
		{
			return new Section($section_id);
		}

		function __construct($section_id)
		{
			CModule::IncludeModule('iblock');
			$this->section = CIBlockSection::GetByID($section_id)
					->Fetch();
		}

		function GetPicture()
		{
			return CFile::GetPath($this->section['PICTURE']);
		}

		function GetResizePicture($with, $height)
		{
			$picture = CFile::ResizeImageGet($this->section['PICURE'], array(
					'width' => $with,
					'height' => $height
			));
			return $picture['src'];
		}
		function GetList(){
			$result = array();
			$t = CIBlockSection::GetList(array('NAME' => 'ASC'),array('iblock_id' => $this->iblock_id));
			while($r = $t->Fetch()){
				$result[$r['ID']] = $r['NAME'];
			}
			return $result;
		}

		function __toString()
		{
			if (is_array($this->section)) {
				return $this->section['NAME'];
			}
			else {
				return "Секция не определена";
			};
		}
		function GetSectionCode(){
			$section = CIBlockSection::GetByID($this->section)->Fetch();
			return $section['CODE'];
		}
	}
 