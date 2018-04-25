<nav>
    <ul class="MainMenuUl">
        <li class="MainMenuLi One DeactiveWidth "><a href="/add" class="MainMenu One DeactiveForm">Add</a></li>
        <li class="MainMenuLi Two DeactiveWidth"><a href="/all" class="MainMenu Two DeactiveForm">All info</a></li>
    </ul>
</nav>
<div class="ContForForm">
    <form class="Register" action="/auth/register" method="post">
        <dl>
            <dt><label class="Auth_Label" for="input_login">Login:</label></dt>
            <dd>
                <input class="Auth_form <?php if(!empty($errors["login"])):?> errorsAuth<?php endif;?>"
                      <?php if(!empty($old["login"])):?> value="<?=$old["login"]?>" <?php endif;?>
                       type="text" id="input_login" name="login"/>
                <?php if(!empty($errors["login"])):?>
                <span class="spanErrors">
                    <?=$errors["login"]?>
                </span>
                <?php endif;?>
            </dd>
            <dt><label class="Auth_Label" for="input_pass">Pass:</label></dt>
            <dd>
                <input class="Auth_form <?php if(!empty($errors["pass"])):?> errorsAuth<?php endif;?>"
                        type="password" id="input_pass" name="pass"/>
                <?php if(!empty($errors["pass"])):?>
                    <span class="spanErrors">
                    <?=$errors["pass"]?>
                </span>
                <?php endif;?>
            </dd>
            <dt><label class="Auth_Label" for="input_pass2">Repeat pass:</label></dt>
            <dd>
                <input class="Auth_form <?php if(!empty($errors["pass2"])):?> errorsAuth<?php endif;?>"
                       type="password" id="input_pass2" name="pass2"/>
                <?php if(!empty($errors["pass2"])):?>
                    <span class="spanErrors">
                    <?=$errors["pass2"]?>
                </span>
                <?php endif;?>
            </dd>
            <dd><input class="Auth_btnForm" type="submit" value="Register"/> </dd>
        </dl>
    </form>
</div>
<div class="ContForMainHref Deactive Clip">
    <a href="/" class="MainHref Deactive Clip">Main</a>
</div>