<script type="text/javascript">
    $(function () {

    });
    function send_message() {

        $.post(
                '/ajax/message_send.php',
                {
                    textarea: $('#textarea').val(),
                    from: "<?=$USER->GetID()?>",
                    to: $('#to').val()
                },
                function (data) {
                    $('#out').html(data);
                }
        );


    }
    function change_id(id) {
        $('#to').val(id);
    }
</script>
<h2>Сообщения</h2>
<div class="mess_left_colomn">
    <?
    $bold = false;
    if (count($arResult['MESSAGES_NEW']) > 0) {
        $bold = true;
    }?>
    <ul>
        <li <?=$_REQUEST['ACTION'] == 'incoming' || !isset($_REQUEST['ACTION'])? "class='active_item'" : null;?>>
            <a href="/user/cabinet/messages/incoming/">
                <?=$bold ? "<strong>" : null;?>
                Входящие (<?=$arResult['MESS_COUNT']['IN']?>)
                <?=$bold ? "</strong>" : null;?>
            </a>
        </li>
        <li <?=$_REQUEST['ACTION'] == 'outgoing' ? "class='active_item'" : null;?>>
            <a id="out" href="/user/cabinet/messages/outgoing/">
                Исходящие (<?=$arResult['MESS_COUNT']['OUT']?>)
            </a>
        </li>
        <li <?=$_REQUEST['ACTION'] == 'basket' ? "class='active_item'" : null;?>>
            <a href="/user/cabinet/messages/basket/">
                Корзина (<?=$arResult['MESS_COUNT']['BASKET']?>)
            </a>
        </li>
    </ul>
</div>
<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<div class="mess_right_colomn">
    <?foreach ($arResult['MESSAGES'] as $mess): ?>
        <?
        $user_from = CUser::GetByID($mess['PROP']['fromUser'])->Fetch();
        ?>
        <div class="messages">

            <div class="user_from">
                <img src="<?=my::GenUserSrc($mess['PROP']['fromUser'])?>" alt=""/>
            </div>
            <div class="text">
                <p>
                    <a href="#"><?=$user_from['NAME'] != '' ? $user_from['NAME'] : $user_from['LOGIN'];?></a>
                </p>
                <span><?=$mess['DATE_CREATE']?></span>
                <?=$mess['PREVIEW_TEXT']?>
            </div>
            <ul class="mess_menu">
                <li><a href="#" onclick="change_id('<?= $user_from['ID'] ?>')" class="js__p_start">Ответить</a></li>
                <li><a href="">Удалить</a></li>
                <li><a href="">Пожаловаться администратору</a></li>
                <li><a href="">Это спан</a></li>
            </ul>

        </div>
    <? endforeach?>
</div>
<div class="clear"></div>


<div class="p_body js__p_body js__fadeout"></div>

<div class="popup js__popup js__slide_top">
    <a href="#" class="p_close js__p_close" title="Закрыть"></a>

    <div class="popup_mess">

        <form  method="post">
            <p>Введите текст сообщения:</p>
            <textarea id="textarea" name="text" class="mar"></textarea>
            <input id="to" type="hidden" name="to">
            <input type="button" onclick="send_message()" value="Отправить"/>
        </form>
    </div>
</div>