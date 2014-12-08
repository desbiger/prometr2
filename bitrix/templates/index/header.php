<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<? $APPLICATION->ShowHead() ?>
	<title><? $APPLICATION->ShowTitle() ?></title>

	<meta http-equiv = "content-type" content = "text/html;charset=UTF-8"/>

	<link rel = "stylesheet" href = "/bitrix/templates/index/css/style.css">
	<link rel = "stylesheet" href = "/bitrix/templates/index/css/reset.css">
	<link rel = "stylesheet" href = "/bitrix/templates/index/css/ui-lightness/jquery-ui-1.7.3.custom.css">
	<link rel = "stylesheet" href = "/bitrix/templates/index/fancybox/jquery.fancybox-1.3.4.css">

	<script type = "text/javascript" src = "/bitrix/templates/index/js/jquery-1.7.min.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/index/js/jquery.checkbox.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/index/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type = "text/javascript" src = "/bitrix/templates/index/js/jquery-ui-1.7.3.custom.min.js"></script>
	<script type = "text/javascript">
		(function ($) {
			$.fn.extend({

				customStyle1: function (options) {
					if (!$.browser.msie || ($.browser.msie && $.browser.version > 6)) {
						return this.each(function () {

							var currentSelected = $(this).find(':selected');
							$(this).after('<span class="select1"><span class="customStyleSelectBoxInner">' + currentSelected.text() + '</span></span>').css({
								position: 'absolute',
								opacity: 0,
								fontSize: $(this).next().css('font-size')
							});
							var selectBoxSpan = $(this).next();
							var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) - parseInt(selectBoxSpan.css('padding-right'));
							var selectBoxSpanInner = selectBoxSpan.find(':first-child');
							selectBoxSpan.css({display: 'inline-block'});
							selectBoxSpanInner.css({width: selectBoxWidth, display: 'inline-block'});
							var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
							$(this).height(selectBoxHeight).change(function () {
								selectBoxSpanInner.text($('option:selected', this).text()).parent().addClass('changed');
							});

						});
					}
				}
			});
		})(jQuery);

		$(function () {
			$('#date').datepicker({"dateFormat": "dd.mm.yy"});
		});
		$(document).ready(function () {
			$('.fancy').fancybox();
			$('.select1').customStyle1();

		});
	</script>
	<script type = "text/javascript" src = "/bitrix/templates/index/js/jquery.popup.js"></script>
	<script type = "text/javascript">
		$(function () {
			$(".js__p_start").simplePopup();
		});
	</script>
</head>
<body>
<? $APPLICATION->ShowPanel() ?>
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth_base", Array(
		"REGISTER_URL" => "",
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
));?>
<div class = "general_content">

	<div class = "left_column">
		<a class = "logo" href = "/"></a>

		<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "razdels_for_menu", Array(
				"IBLOCK_TYPE" => "zakazy",
				"IBLOCK_ID" => "5",
				"SECTION_ID" => $_REQUEST["SECTION_ID"],
				"SECTION_CODE" => "",
				"COUNT_ELEMENTS" => "Y",
				"TOP_DEPTH" => "1",
				"SECTION_FIELDS" => array(
						0 => "",
						1 => "",
				),
				"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "UF_KLASS",
						2 => "",
				),
				"SECTION_URL" => "",
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_GROUPS" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y"
		));?>
	</div>

	<div class = "right_column">


		<div class = "content">
