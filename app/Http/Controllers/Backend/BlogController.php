<?php

namespace App\Http\Controllers\Backend;

use App\Backeend\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Backend\Tag;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('id', 'desc')->get();
        return view('backend.pages.blog.entry', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       dd(Session('ckeditortempimage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Backeend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Backeend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Backeend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Backeend\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }


    public function uploadImage(Request $request) {
    $CKEditor = $request->input('CKEditor');
    $funcNum  = $request->input('CKEditorFuncNum');
    $message  = $url = '';
    if (Input::hasFile('upload')) {
        $file = Input::file('upload');
        if ($file->isValid()) {

            $img = time() . '.'. $file->getClientOriginalExtension();
        $location = 'ckeditor/upload/' .$img;
        Image::make($file)->save($location);
        $request->session()->push('ckeditortempimage', $img);

            //$filename =rand(1000,9999).$file->getClientOriginalName();
            //$file->move(public_path().'ckeditor/upload/', $filename);
            $url = url('ckeditor/upload/' . $img);
        } else {
            $message = 'An error occurred while uploading the file.';
        }
    } else {
        $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
}
}
