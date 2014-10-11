<?
	function GetSectionImage($section_id){
		$section = CIBlockSection::GetByID($section_id)->GetNext();
		return $section['PICTURE'];
	}
 