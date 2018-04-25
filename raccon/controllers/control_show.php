<?php
function action_all(){
    load_model("image");
    $images=model_getAllImages();
    if (empty($images)){ echo("no images"); return;}
    load_view("all", ["images"=>$images]);
}

function action_about(){
    $id=@$_GET["image_id"];
    if(empty($id) || !DB_selectById("images", $id)) {
     echo("empty or underfined image");
        return;
    }
    $image=DB_selectById("images", $id);
    load_view("about", ["image"=>$image]);
    }



function action_delete(){
    $id=@$_GET["image_id"];
    if(empty($id) || !DB_selectById("images", $id)) {
        echo("empty or underfined image");
        return;
    }
    DB_delete("images", $id);
    $back=$_SERVER["HTTP_REFERER"];
    header("Location:".$back);

}