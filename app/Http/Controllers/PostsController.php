<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostResourceGest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostsController extends Controller
{

    public function __construct()
    {
         $this->middleware('jwt.auth')->except(['index','show']);

    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return PostCollection::collection($posts);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if ((auth()->user()) || (auth()->user()->type == 'admin') || $this->middleware('auth')) {
            $fileNameStoreImage = null;
            $fileNameStoreVideo = null;
            $fileNameStoreFile = null;
            //
            $this->validate($request, [
                'title' => 'required',
                'hero_image' => 'image|nullable|max:10000000 | mimes:jpg,png,jpeg,svg',
                'post_video' => 'nullable | max:10000000 |mimes:mp4,3pg,flv,mkv,weba',
                'custom_file' => 'nullable|max:10000000 | mimes:pdf,txt,docx,doc,pptx,ppt,xls ',
            ]);

//upload image
            if ($request->hasFile('hero_image')) {

//            foreach ($request->hero_image as $hero_image) {

                $filenameWithExtention = $request->file('hero_image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('hero_image')->getClientOriginalExtension();
                $fileNameStoreImage = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('hero_image')->move(base_path() . '/public/uploaded/images/', $fileNameStoreImage);

            }

            //        upload file

            if ($request->hasFile('custom_file')) {

                $filenameWithExtention = $request->file('custom_file')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('custom_file')->getClientOriginalExtension();
                $fileNameStoreFile = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('custom_file')->move(base_path() . '/public/uploaded/files/', $fileNameStoreFile);

            }

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id = auth()->user()->id;
            $post->hero_image = $fileNameStoreImage;
            $post->custom_file = $fileNameStoreFile;
            $post->save();

             return redirect('api/articles')->with('success', 'Done successfully');
        } else {
             return redirect('api/login')->with('Unauthorized' , 'Please Login First');
        }
    }

     public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ((auth()->user()->id == $post->user_id) || (auth()->user()->type == 'admin')) {
            // $fileNameStoreImage = null;
            // $fileNameStoreFile = null;

            $fileNameStoreImage = $post->hero_image;
            $fileNameStoreVideo = $post->post_video;
            $fileNameStoreFile = $post->custom_file;

            $this->validate($request, [
                'title' => 'required',
                'hero_image' => 'image|nullable|max:10000000 | mimes:jpg,png,jpeg,svg',
                'custom_file' => 'nullable|max:10000000 | mimes:pdf,txt,docx,doc,pptx,ppt,xls ',
            ]);

            //upload image
            if ($request->hasFile('hero_image')) {

                $filenameWithExtention = $request->file('hero_image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('hero_image')->getClientOriginalExtension();
                $fileNameStoreImage = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('hero_image')->move(base_path() . '/public/uploaded/images/', $fileNameStoreImage);

                // $fileNameStoreVideo = null;
                // $fileNameStoreFile = null;

            }

            // upload file

            if ($request->hasFile('custom_file')) {

                $filenameWithExtention = $request->file('custom_file')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('custom_file')->getClientOriginalExtension();
                $fileNameStoreFile = $fileName . '_' . time() . '.' . $extension;

                $path = $request->file('custom_file')->move(base_path() . '/public/uploaded/files/', $fileNameStoreFile);

              // $fileNameStoreImage = null;
            }

            // $post =   Post::findOrFail($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->hero_image = $fileNameStoreImage;
            $post->custom_file = $fileNameStoreFile;
            $post->update();

             return new PostResource($post);
        } else {
            return redirect('/api/articles')->with('error', 'Unauthorized');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ((auth()->user()->id == $post->user_id) || auth()->user()->type == 'admin') {

            if ($post->hero_image) {
                Storage::delete('/public/uploaded/images/' . $post->hero_image);

            }
            if ($post->custom_file) {
                Storage::delete('/public/uploaded/files/' . $post->custom_file);

            }

            $post->delete();
            return redirect('/api/articles')->with('success', 'Done successfully');
        } else {
            return redirect('/api/articles')->with('error', 'Unauthorized');

        }

    }

}
