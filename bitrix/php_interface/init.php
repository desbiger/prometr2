<?
	include('classes/Section.php');
	include('classes/City.php');
	function GetSectionImage($section_id)
	{
		$section = CIBlockSection::GetByID($section_id)
				->GetNext();
		return $section['PICTURE'];
	}

	function GetUserByEmail($email)
	{
		global $DB;
		$q      = "SELECT * FROM b_user WHERE EMAIL = '{$email}'";
		$result = $DB->Query($q)
				->Fetch();
		return (bool)$result['ID'];
	}