<nav>
    <ul class="MainMenuUl">
        <li class="MainMenuLi One Deactive "><a href="/add" class="MainMenu One Deactive">Add</a></li>
        <li class="MainMenuLi Two DeactiveWidth"><div class="MainMenu Two DeactiveWidth">All info</div></li>

    </ul>
</nav>
<div class="ContForForm">
    <?php if(!authIsAuth()):?>
        <div class="RegisterOnly">
            View images can registered users only
        </div>
    <?php endif;?>
    <?php if(authIsAuth()):?>
        <?php foreach ($images as $image):?>

        <div class="ImageView">
            <div class="ListImagesItemNameImage">
                <div class="ListImagesItemName"><?=$image["name"]?></div>
                <img src="<?=$image["url"]?>" alt="foto" class="ListImagesItemImage About">
            </div>
            <div class="ListImagesItemAbout">
            <?=$image["about"]?>
            </div>
            <div class="ListImagesItemHref">
                <a href="/delete?image_id=<?=$image["id"]?>" class="ListImagesItemHref Delete">
                    <img src="/media/images_for_face/Delete.png">
                </a>
            </div>
        </div>

        <?php endforeach;?>


    <?php endif;?>
</div>
<div class="ContForMainHref Deactive Clip">
    <a href="/" class="MainHref Deactive Clip">Main</a>
</div>