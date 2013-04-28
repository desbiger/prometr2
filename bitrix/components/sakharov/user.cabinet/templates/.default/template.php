<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<script type="text/javascript" src="/bitrix/templates/index/js/jquery.form.js"></script>
<script type="text/javascript">
    $(function () {
        $('#file_content').change(function () {
            {
                $('#myForm').ajaxForm();
                $("#myForm").ajaxSubmit({
                    url: '/ajax/load_avatar.php',
                    iframe: true,
                    dataType: null,
                    beforeSubmit: function (arr, $form, options) {
                        $("#master_ava").attr('src', "/bitrix/templates/index/img/loading9.gif");
                    },
                    success: function (data) {
                        $("#master_ava").attr('src', data);
                    }
                });
            }
        });
    });
</script>
<!--    <pre>--><?//print_r($_SERVER)?><!--</pre>-->
<!--<pre>--><?//print_r($arResult['POST'])?><!--</pre>-->
<? $user = $arResult['USER'] ?>

<div class="cabinet_div">
    <?if (count($arResult) > 0): ?>
        <div class="stro header_block">Личный кабинет</div>
        <ul class="top_menu">
            <?$ch = 'class="check"'; $ch_e = null;?>
            <li><a <?=$_REQUEST['PAGE'] == '' ? $ch : $ch_e ?>  href="/user/cabinet/">Личные данные</a></li>

            <li class="tm2"><a <?=$_REQUEST['PAGE'] == 'master' ? $ch : $ch_e ?> href="/user/cabinet/master/">Страница мастера</a></li>

            <li class="tm3"><a <?=$_REQUEST['PAGE'] == 'messages' ? $ch : $ch_e ?> href="/user/cabinet/messages/">Сообщения</a></li>

            <li><a <?=$_REQUEST['PAGE'] == 'gallery' ? $ch : $ch_e ?> href="/user/cabinet/gallery/">Фотогалереи</a></li>
        </ul>
        <form id="myForm" method="post" enctype="multipart/form-data">
            <? if ($_REQUEST['PAGE'] == ''): ?>
                <? require('pages/base_page_user.php'); ?>
            <? elseif (isset($_REQUEST['PAGE']) && $_REQUEST['PAGE'] == 'master'): ?>
                <? require('pages/master_page.php'); ?>
            <? elseif (isset($_REQUEST['PAGE']) && $_REQUEST['PAGE'] == 'messages'): ?>
                <? require('pages/messages.php'); ?>
            <? elseif (isset($_REQUEST['PAGE']) && $_REQUEST['PAGE'] == 'gallery'): ?>
                <? require('pages/gallery.php'); ?>
            <?endif ?>
        </form>
    <? else: ?>
        <div class="stro header_block">Личный кабинет</div>
        <h2>Необходимо зарегистрироваться</h2>
    <?endif?>
</div>