<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use File;

class PostController extends Controller
{
    public function store(PostFormRequest $request)
    {
        $request['user_id'] = Auth()->id();
        if ($request->has('media_path')) {
            $images = [];
            foreach ($request->file('media_path') as $media) {

                $image = $media->getClientOriginalName();
                $newImageName = time() . $image;

                $media->storeAs('post/media', $newImageName, 'public');
                $images[] = $newImageName;
            }
            $request['media'] = $images;
        }

        Post::create($request->all());
        return redirect()->route('dashboard.index')->with('sucess', 'Post criado com sucesso');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.index')->with('sucess', 'Post apagado com sucesso');
    }

    public function show(Post $post)
    {
        return view('post.show')->with('post', $post);
    }

    public function edit(Post $post)
    {
        $editing = true;
        return view('post.show')
            ->with('post', $post)
            ->with('editing', $editing);
    }

    public function update(Post $post, PostFormRequest $request)
    {
        $post->content = $request->content;

        if ($request->has('media_path')) {
            $images = [];
            foreach ($request->file('media_path') as $media) {

                $image = $media->getClientOriginalName();
                $newImageName = time() . $image;

                $media->storeAs('post/media', $newImageName, 'public');
                $images[] = $newImageName;
            }
            $media = $post->media->concat($images);
            $post->media = $media;
        }


        $post->save();

        return redirect()->route('posts.show', $post->id)
            ->with('sucess', 'Post atualizado com sucesso');
    }

    public function destroyPhoto(Post $post, string $image)
    {
        $imagePath = "post/media/$image";

        $media = $post->media->reject(function ($value) use ($image) {
            return $value == $image;
        });
        $post->media = $media;
        $post->save();
        Storage::disk('public')->delete($imagePath);

        return redirect()->back()->with('sucess', 'Deletado com sucesso');
    }
}
