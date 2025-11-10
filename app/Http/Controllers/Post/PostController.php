<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; 

class PostController extends Controller{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'content' => 'required|string|max:5000',
            'image' => 'nullable|image|max:10240',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(), 
            'content' => $validated['content'],
            'image_url' => $request->hasFile('image') 
                ? Storage::url($request->file('image')->store('posts', 'public'))
                : null,
        ]);

        return redirect()->route('feed')->with('success', 'Publicación creada exitosamente');
    }

    public function destroy(Post $post){
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        if ($post->image_url) {
            $imagePath = str_replace('/storage/', '', $post->image_url);
            Storage::disk('public')->delete($imagePath);
        }

        $post->delete();

        return redirect()->route('feed')->with('success', 'Publicación eliminada');
    }

    public function like(Post $post){
        $user = Auth::user();
        
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->detach($user->id);
        } else {
            $post->likes()->attach($user->id);
        }

        return back();
    }

    public function comment(Request $request, Post $post){
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        return back();
    }

    public function share(Post $post){
        Auth::user()->posts()->create([
            'content' => '',
            'shared_post_id' => $post->id,
        ]);

        return back()->with('success', 'Publicación compartida');
    }
}