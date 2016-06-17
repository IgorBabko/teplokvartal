<?php

namespace DymaVDomeNet\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DymaVDomeNet\Photo;
use DymaVDomeNet\Http\Requests;
use DymaVDomeNet\Http\Controllers\Controller;
use DymaVDomeNet\Http\Middleware\Authenticate;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $photo = Photo::create($request->all());

        if ($request->file('image')) {
            $this->saveImage($request, $photo);
        }

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Фотография успешно добавлена!'
        ]);

        return redirect('/admin/photos');
    }

    protected function saveImage(Request $request, Photo $photo, $replace = false)
    {
        $imageName = $photo->id . '.' . $request->file('image')->getClientOriginalExtension();

        if ($replace) {
            \Storage::delete(public_path() . $photo->image);
        }

        $request->file('image')->move(public_path() . '/images/uploads/', $imageName);
    
        $photo->image = '/images/uploads/' . $imageName;
        $photo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            $this->saveImage($request, $photo, true);
        }

        $photo->description = $request->description;

        $photo->save();

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Фотография успешно обновлена!'
        ]);

        return redirect('/admin/photos');
    }

    protected function flashData(Request $request, $data = [])
    {
        foreach ($data as $key => $value) {
            $request->session()->flash($key, $value);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Photo::destroy($id); 

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Фотография успешно удалена!',
        ]);

        return back();
    }
}