<?php
function model_getAllImages(){
    return DB_selectAll("images");
}
function _model_createImage($name, $url, $about){
    return[
        "name" =>$name,
        "url"  =>$url,
        "about" =>$about
    ];
}
function model_appendImage($name, $url, $about){
    $new_image=_model_createImage($name, $url, $about);
    DB_insertToTable("images", $new_image);
}
function model_getImageByID($id){
    $image=DB_selectById("images", $id);
    return @$image;
}
