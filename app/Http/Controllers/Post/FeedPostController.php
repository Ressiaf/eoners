<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class FeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // IDs de usuarios que sigue
        $followingIds = $user->following()->pluck('users.id')->toArray();
        
        // Agregar el propio ID del usuario
        $followingIds[] = $user->id;
        
        // Obtener posts de usuarios que sigue + propios
        $posts = Post::with(['user', 'likes', 'comments'])
            ->whereIn('user_id', $followingIds)
            ->latest()
            ->paginate(10);

        return view('feed', compact('posts'));
    }
}