<?

	class Diclare
	{
		static function init()
		{
			return new Diclare();
		}

		function __construct()
		{

		}

		function Add($user)
		{
			CModule::IncludeModule('iblock');
			$el     = new CIBlockElement();
			$PROPS  = Array(
					'PHONE' => $_POST['phone'],
					'CITY' => $_POST['city'],
					'PRICE' => $_POST['price'],
					'USER' => $user,
					'USER_NAME' => $_POST['name'],
			);
			$fields = array(
					'IBLOCK_ID' => 5,
					'NAME' => $_POST['title'],
					'IBLOCK_SECTION_ID' => $_POST['section'],
					'DETAIL_TEXT' => $_POST['text'],
					'PROPERTY_VALUES' => $PROPS
			);

			if ($id = $el->Add($fields)) {
				$code = Section::factory($_POST['section'])
						->GetSectionCode();
				LocalRedirect('/' . $code . '/' . $id . '/');
			}
			else {
				return $el->LAST_ERROR;
			}

		}
	}
 