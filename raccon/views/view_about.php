<nav>
    <ul class="MainMenuUl">
        <li class="MainMenuLi One Deactive "><a href="/add" class="MainMenu One Deactive">Add</a></li>
        <li class="MainMenuLi Two DeactiveWidth"><div class="MainMenu Two DeactiveWidth">About</div></li>

    </ul>
</nav>
<div class="ContForForm">
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

</div>
<div class="ContForMainHref Deactive Clip">
    <a href="/" class="MainHref Deactive Clip">Main</a>
</div>