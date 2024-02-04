<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(PostFormRequest $request)
    {
        $request['user_id'] = Auth()->id();
        if ($request->has('media_path')) {
            $imagesPath = [];
            foreach ($request->file('media_path') as $media) {

                $image = $media->getClientOriginalName();
                $imageName = pathinfo($image, PATHINFO_FILENAME);
                $currentData = strtotime(date('Y-m-d H:i:s'));
                $newImageName = $imageName . $currentData;

                $path = $media->storeAs('post/media', $newImageName, 'public');
                $imagesPath[] = $path;
            }
            $request['media'] = $imagesPath;
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
        $post->save();

        return view('post.show')
            ->with('post', $post)
            ->with('sucess', 'Post atualizado com sucesso');
    }
}
