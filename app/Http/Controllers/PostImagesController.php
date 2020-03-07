<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostImages\StoreRequest;
use Illuminate\Http\Request;
use App\Models\PostImages;
use App\Models\Post;
use Arr;

class PostImagesController extends Controller
{
    public function index(){
        $postImages = PostImages::all();
        return view('backend.postImages.index',['postImages' => $postImages,]);
    }

    public function create(){
        $post=Post::all();
        return view('backend.postImages.create',compact('post'));
    }

    public function store(StoreRequest $request)
    {
        $data = Arr::except($request->all(), ['_token','avatar']);
        $postImages = PostImages::create($data);
        return redirect()->route('postImages.index');
    }

    public function edit($id){
        $data['postImage'] = PostImages::find($id);
        $post= Post::all();
        return view('backend.postImages.edit',$data,compact('post'));
    }

    public function update(Request $request, $id)
    {
        //
        $data = Arr::except(request()->all(), ["_token"]);
        $postImages = PostImages::find($id);
        $postImages->url = $data['url'];
        $postImages->post_id = $data['post_id'];
        $postImages->save();

        return redirect()->route('postImages.index');
    }
    public function destroy($id)
    {
        PostImages::destroy($id);
        return redirect()->route('posts.index');
    }
}
