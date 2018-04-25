<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Caveat&amp;subset=cyrillic" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
</head>
<body>
<header>
    <h1>give image to World</h1>
    <div class="Auth">
        <?php if(!authIsAuth()):?>
        <a href="/register" class="AuthBtn">Register</a>
        <a href="/login" class="AuthBtn">Enter</a>
        <?php endif;?>
        <?php if(authIsAuth()):?>
            <a href="/auth/logout" class="AuthBtn">Exit</a>
        <?php endif;?>
    </div>
    <a href="/" class="LogoHref">
        <img class="Logo" src="/media/images_for_face/icon.png" alt="logo">
    </a>
</header>
<div class="Cont">

    <?php include $file; ?>

</div>
    <footer>
    </footer>

</body>
</html>