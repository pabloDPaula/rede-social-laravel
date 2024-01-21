<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->withCount('likes')->paginate(4);

        return view('user.show')
            ->with('user', $user)
            ->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $posts = $user->posts()->paginate(4);

        return view('user.edit')
            ->with('user', $user)
            ->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $messages = [
            'name.required' => 'O campo nome é obrigatório',
            'bio.required' => 'O campo bio é obrigatório',
            'min' => 'O mínimo é de :min caracteres',
            'max' => 'O máximo é de :max caracteres ',
            'image' => 'O arquivo deve ser uma imagem'
        ];

        $validated = $request->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'required|min:1|max:255',
            'image' => 'image'
        ], $messages);

        if ($request->has('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $imageName = pathinfo($image, PATHINFO_FILENAME);
            $currentData = strtotime(date('Y-m-d H:i:s'));
            $newImageName = $imageName . $currentData . $user->id;

            $imagePath = $request->file('image')->storeAs('profile', $newImageName, 'public');
            $validated['image'] =  $imagePath;

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        $user->update($validated);
        return redirect()->route('profile')->with('sucess', 'Perfil atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function profile()
    {
        return $this->show(Auth::user());
    }
}
