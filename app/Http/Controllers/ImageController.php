<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    private $image;

    function __construct(ImageModel $image)
    {
        $this->image = $image;
    }

    public function index()
    {
        $pages = $this->image->index();
        return view('gallery.paginator',['pages' => $pages]);
    }

    public function show($id)
    {
        $images = $this->image->show($id);
        return view('gallery.show',['images' => $images]);
    }

    public function edit($id)
    {
        $images = $this->image->edit($id);
        return view('gallery.edit',['images' => $images]);
    }

    public function update(Request $request)
    {
        $old_path = $this->image->getPathImage($request->id_image);
        $this->image->delImageFile($old_path);
        $images = $request->file('image');
        $this->image->addImageFile($request->id_image,$images);
        return redirect('/gallery');
    }

    public function add()
    {
        return view('gallery.add',[]);
    }

    public function create(Request $request)
    {

        $images = $request->file('image');
        $path = $images->store('uploads');
        $this->image->create($path);
        return redirect('/gallery');
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
