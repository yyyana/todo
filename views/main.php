<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *, html, body{
            margin: 0;
            padding: 0;
        }

        .main{
            width: 600px;
            height: 500px;
            background: red;
            margin: 0 auto;
            position: relative;
        }

        .inpUp{
            width: 70%;
            position: absolute;
            justify-content: space-between;
        }

        .inpText{
            width: 70%;
        }

    </style>
</head>
<body>
    <div class="main">
        <div class="inpUp">

            <form action="add" method="post">
                <input type="text" class="inpText">
                <input type="button" value="ADD">
            </form>

        </div>

    </div>
</body>
</html>
