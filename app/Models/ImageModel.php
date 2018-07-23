<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageModel extends Model
{
    protected $table = 'image_models';
    protected $image;

//public function __construct()
//{
//    $this->image = new ImageModel();
//}
public function store()
{
    $image = new ImageModel();
    $image::all();
    dd($image);
}
public function index()
{
    $image = new ImageModel();
    $pages = $image::paginate(6);
    return $pages;

}

public function show($id)
{
    $image = new ImageModel();
    $images = $image::where('id',$id)->first();
    return $images;
}

public function edit($id)
{
    $image = new ImageModel();
    $images = $image::where('id',$id)->first();
    return $images;

}

public function del($id)
{
    $image = new ImageModel();
    $images = $image::where('id',$id)->first();
    ImageModel::destroy($id);
    Storage::delete($images->imagePath);
}

public function create($path)
{
    $image = new ImageModel();
    $image::insert(array(
        'imagePath' => $path
    ));
}

public function getPathImage($id)
{
    $image = new ImageModel();
    $old_path = $image::where('id',$id)->first();
    return $old_path->imagePath;
}

public function delImageFile($path)
{
    Storage::delete($path);
}

public function addImageFile($id,$path)
{
    $image = new ImageModel();
    $images = $image->edit($id);
    $paths = $path -> store('uploads');
    $images->imagePath = $paths;
    $images->save();
}

}
