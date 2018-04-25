    <nav>
        <ul class="MainMenuUl">
            <li class="MainMenuLi One DeactiveWidth "><div class="MainMenu One DeactiveWidth">Add</div></li>
            <li class="MainMenuLi Two Deactive"><a href="/all" class="MainMenu Two Deactive"> All info</a></li>
        </ul>
    </nav>
    <div class="ContForForm">
        <?php if(authIsAuth()):?>
        <form class="FormAddImg" action="/add/image" method="post" enctype="multipart/form-data">
            <input class="FormName" type="text" name="name" placeholder="name...."/>
            <input class="FileAddImage" type="file" name="load_img" accept="image/*"/>
            <textarea class="AboutImage" name="about_img" placeholder="About..."></textarea>
            <input class="SubmitAddImage" type="submit" value="give"/>
        </form>
        <div class="ContListImages">
            <?php foreach ($images as $image):?>

            <div class="ListImages">
                <div class="ListImagesItemNameImage">
                    <div class="ListImagesItemName"><?=$image["name"]?></div>
                    <img src="<?=$image["url"]?>" alt="foto" class="ListImagesItemImage">
                </div>
                <div class="ListImagesItemHref">
                    <a href="/about?image_id=<?=$image["id"]?>" class="ListImagesItemHref About">
                        <img src="/media/images_for_face/About.png">
                    </a>
                    <a href="/delete?image_id=<?=$image["id"]?>" class="ListImagesItemHref Delete">
                        <img src="/media/images_for_face/Delete.png">
                    </a>
                </div>
            </div>

            <?php endforeach;?>

        </div>
        <?php endif;?>
        <?php if(!authIsAuth()):?>
            <div class="RegisterOnly">
            Add images can registered users only
            </div>
        <?php endif;?>
    </div>
    <div class="ContForMainHref Deactive Clip">
        <a href="/" class="MainHref Deactive Clip">Main</a>
    </div>
