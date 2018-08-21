<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageModel extends Model
{
    protected $table = 'image_models';
    protected $image;


public function store()
{
    $image = new ImageModel();
    $image::all();
    dd($image);
}
public function index()
{
    $image = new ImageModel();
    $pages = $image::paginate(4);
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

public function create($path,$category)
{
    $image = new ImageModel();
    $image::insert(array(
        'imagePath' => $path,
        'category_model_id' => $category
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

public function addImageFile($id,$path,$category)
{
    $image = new ImageModel();
    $images = $image->edit($id);
    $old_path = $images->imagePath;
//    dd($old_path);
    if ($path==null)
    {
        $images->imagePath = $old_path;
    }
    else
    {
        $old_path = $image->getPathImage($id);//
        $image->delImageFile($old_path);//
        $paths = $path -> store('uploads');
        $images->imagePath = $paths;
    }

    $images->category_model_id = $category;
//    dd($images);
    $images->save();
}

public function showCategory()
{
    return CategoryModel::all();

}

public function calcItemModel($id)
{
    return $imag = ImageModel::where('category_model_id',$category)->count();
}

public function showOneCategoru($category)
{

    return $imag = ImageModel::where('category_model_id',$category);

}

public function category()
{
    return $this->belongsTo('App\Models\CategoryModel','category_model_id','id');
}

}
