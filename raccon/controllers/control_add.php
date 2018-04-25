<?php
function action_index(){
    load_model("image");
    $images = DB_selectAll("images");
    load_view("add", ["images"=>$images]);
}

function _getTypeImage($type){
    $type_array = explode("/", $type);
    return end($type_array);
}
function _generate_filename(){
    return strftime("%d%m%y_%H%M%S_").rand(1000, 9999);
}
function action_add(){
    $tmp_name = @ $_FILES["load_img"]["tmp_name"];
    $type = @ $_FILES["load_img"]["type"];
    $name = @ $_POST["name"];
    $about = @ $_POST["about_img"];
    if(empty($tmp_name)|| empty($type) || empty($name) || empty($about)) {
        echo("try again, empty files");
        return;
    }
    $type =_getTypeImage($type);
    $new_name = _generate_filename();
    $url="media/images/".$new_name.".".$type;
    $path = DOCROOT."media/images/".$new_name.".".$type;
    if(!move_uploaded_file($tmp_name, $path)){
        echo "error in saving, sorry";
        return;
    }
    load_model("image");
    model_appendImage($name, $url, $about);
    redirect("/add");
}