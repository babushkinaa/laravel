<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    private $image;

    function __construct(ImageModel $image, CategoryModel $category)
    {
        $this->image = $image;
        $this->category = $category;
    }

    public function index()
    {
        $pages = $this->image->index();
        $category = $this->image->showCategory();
        return view('gallery.paginator',['pages' => $pages, 'categorys' => $category]);
    }

    public function showIndexCategory($id)
    {
        $category = $this->image->showCategory();
        $pages = $this->image->showOneCategoru($id);
        $pages = $pages->paginate(4);
//        dd($pages);
        return view('gallery.gallery',['pages' => $pages, 'categorys' => $category]);


    }

    public function show($id)
    {
        $images = $this->image->show($id);
        return view('gallery.show',['images' => $images]);
    }

    public function edit($id)
    {
        $images = $this->image->edit($id);
        $category = CategoryModel::pluck('category','id');
        return view('gallery.edit',['images' => $images,'category'=>$category]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'image' => 'nullable | image',
            'category' => 'required'
        ]);
//        $old_path = $this->image->getPathImage($request->id_image);
//        $this->image->delImageFile($old_path);
        $images = $request->file('image');
        $this->image->addImageFile($request->id_image,$images,$request->category);
        return redirect('/gallery');
    }

    public function add()
    {
        $category = CategoryModel::pluck('category','id');
//        dd($category);
        return view('gallery.add',['category'=>$category]);
    }

    public function create(Request $request)
    {
//        dd($request);
        $this->validate($request,[
            'image' => 'required | image',
            'category' => 'required'
        ]);
        $images = $request->file('image');
        $path = $images->store('uploads');
        $category = $request->category;
//        dd($category);
        $this->image->create($path,$category);
        return redirect('/gallery');
    }

    public function c(Request $request)
    {

        $category = CategoryModel::all();

//        $category = CategoryModel::all();
        $imag = ImageModel::all();

//        $imag->category;
        $exitimage = $imag->filter(function ($imags)
        {
            return $imags['category_model_id'] == 1;
        });
//        dump($category);
//        dd($imag);
        return view('gallery.test',['images'=>$exitimage, 'category' =>$category]);
    }

    public function delete($id)
    {
        $this->image->del($id);
        return redirect('/gallery');
    }

    public function test()
    {
        $this->image->store();
    }

}
