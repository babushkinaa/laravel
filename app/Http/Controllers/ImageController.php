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
        $images = ImageModel::all();
        $pages = ImageModel::paginate(6);

        return view('gallery.paginator',['pages' => $pages]);
    }

    public function show($id)
    {
        $images = ImageModel::where('id',$id)->first();

        return view('gallery.show',['images' => $images]);
    }

    public function edit($id)
    {
        $images = ImageModel::where('id',$id)->first();
        return view('gallery.edit',['images' => $images]);
    }

    public function update(Request $request)
    {

        $old_path = ImageModel::where('id',$request->id_image)->first();
        Storage::delete($old_path->imagePath);
        $images = $request->file('image');
        $path = $images->store('uploads');
        $old_path->imagePath = $path;
        $old_path->save();
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

        ImageModel::insert(array(
            'imagePath' => $path
        ));

        return redirect('/gallery');
    }

    public function delete($id)
    {
        $images = ImageModel::where('id',$id)->first();
        ImageModel::destroy($id);
        Storage::delete($images->imagePath);

        return redirect('/gallery');
    }

}
