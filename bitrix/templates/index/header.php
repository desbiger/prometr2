<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <?$APPLICATION->ShowHead()?>
    <title><?$APPLICATION->ShowTitle()?></title>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    <link rel="stylesheet" href="/bitrix/templates/index/css/style.css">
    <link rel="stylesheet" href="/bitrix/templates/index/css/reset.css">
    <link rel="stylesheet" href="/bitrix/templates/index/css/ui-lightness/jquery-ui-1.7.3.custom.css">
    <link rel="stylesheet" href="/bitrix/templates/index/fancybox/jquery.fancybox-1.3.4.css">

    <script type="text/javascript" src="/bitrix/templates/index/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="/bitrix/templates/index/js/jquery.checkbox.js"></script>
    <script type="text/javascript" src="/bitrix/templates/index/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="/bitrix/templates/index/js/jquery-ui-1.7.3.custom.min.js"></script>
    <script type="text/javascript">
        (function ($) {
            $.fn.extend({

                customStyle1:function (options) {
                    if (!$.browser.msie || ($.browser.msie && $.browser.version > 6)) {
                        return this.each(function () {

                            var currentSelected = $(this).find(':selected');
                            $(this).after('<span class="select1"><span class="customStyleSelectBoxInner">' + currentSelected.text() + '</span></span>').css({position:'absolute', opacity:0, fontSize:$(this).next().css('font-size')});
                            var selectBoxSpan = $(this).next();
                            var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) - parseInt(selectBoxSpan.css('padding-right'));
                            var selectBoxSpanInner = selectBoxSpan.find(':first-child');
                            selectBoxSpan.css({display:'inline-block'});
                            selectBoxSpanInner.css({width:selectBoxWidth, display:'inline-block'});
                            var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
                            $(this).height(selectBoxHeight).change(function () {
                                selectBoxSpanInner.text($('option:selected', this).text()).parent().addClass('changed');
                            });

                        });
                    }
                }
            });
        })(jQuery);

        $(function(){
            $('#date').datepicker({"dateFormat": "dd.mm.yy"});
        });


        $(document).ready(function () {
            $('.fancy').fancybox();
            $('.select1').customStyle1();

            $(".first a").click(function () {
                $(".first span").addClass("check_left");
                $(".two span").removeClass("check_left");
                $(".free span").removeClass("check_left");
                $(".four span").removeClass("check_left");

                $(".form_content").attr("name", "remont");
                $(".zayavka").css("color", "#26AB30");
                $(".header_block").addClass("rem");
                $(".header_block").removeClass("arhitect stro mat");
                $(".header_block").text("РЕМОНТ");
            });

            $(".two a").click(function () {
                $(".first span").removeClass("check_left");
                $(".two span").addClass("check_left");
                $(".free span").removeClass("check_left");
                $(".four span").removeClass("check_left");

                $(".form_content").attr("name", "stroy");
                $(".zayavka").css("color", "#F26B20");
                $(".header_block").addClass("stro");
                $(".header_block").removeClass("arhitect rem mat");
                $(".header_block").text("СТРОИТЕЛЬСТВО");
            });

            $(".free a").click(function () {
                $(".first span").removeClass("check_left");
                $(".two span").removeClass("check_left");
                $(".free span").addClass("check_left");
                $(".four span").removeClass("check_left");

                $(".form_content").attr("name", "arhitect");
                $(".zayavka").css("color", "#01A3D4");
                $(".header_block").removeClass("rem stro mat");
                $(".header_block").addClass("arhitect");
                $(".header_block").text("АРХИТЕКТУРА И ДИЗАЙН");
            });

            $(".four a").click(function () {
                $(".first span").removeClass("check_left");
                $(".two span").removeClass("check_left");
                $(".free span").removeClass("check_left");
                $(".four span").addClass("check_left");

                $(".form_content").attr("name", "material");
                $(".zayavka").css("color", "#DE0F01");
                $(".header_block").addClass("mat");
                $(".header_block").removeClass("arhitect stro rem");
                $(".header_block").text("СТРОЙМАТЕРИАЛЫ");
            });


        });


    </script>
    <script type="text/javascript" src="/bitrix/templates/index/js/jquery.popup.js"></script>
    <script type="text/javascript">
        $(function () {
                    $(".js__p_start").simplePopup();
                });
    </script>
</head>
<body>
<?$APPLICATION->ShowPanel()?>
<div class="general_content">
    <div class="left_column">
        <a class="logo" href="/"></a>

        <?$APPLICATION->IncludeComponent(
        	"bitrix:catalog.section.list",
        	"razdels_for_menu",
        	Array(
        		"IBLOCK_TYPE" => "zakazy",
        		"IBLOCK_ID" => "5",
        		"SECTION_ID" => $_REQUEST["SECTION_ID"],
        		"SECTION_CODE" => "",
        		"COUNT_ELEMENTS" => "Y",
        		"TOP_DEPTH" => "1",
        		"SECTION_FIELDS" => array(0=>"",1=>"",),
        		"SECTION_USER_FIELDS" => array(0=>"",1=>"UF_KLASS",2=>"",),
        		"SECTION_URL" => "",
        		"CACHE_TYPE" => "N",
        		"CACHE_TIME" => "36000000",
        		"CACHE_GROUPS" => "Y",
        		"ADD_SECTIONS_CHAIN" => "Y"
        	)
        );?>
    </div>

    <div class="right_column">
        <?$APPLICATION->IncludeComponent(
       	"bitrix:system.auth.form",
       	"auth_base",
       	Array(
       		"REGISTER_URL" => "",
       		"FORGOT_PASSWORD_URL" => "",
       		"PROFILE_URL" => "",
       		"SHOW_ERRORS" => "N"
       	)
       );?>

        <div class="content">
