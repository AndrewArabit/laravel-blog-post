<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input("name");
        $post = POST::when(
            $name,
            fn($query, $name) => $query->Name($name)->latest()
        )
        ->commentCount();
        
        return view('posts.view', ['posts' => $post->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
       $post = Post::with([
        "comments" => fn($query) => $query->latest()
        ])->findOrFail($id);

        foreach ($post->comments as $comment) {
            $comment->relative_date = $this->formatRelativeDate($comment->created_at);
        }

       return view("posts.show", ['post' => $post]);
    }
    

    public function formatRelativeDate($dateString)
    {
        $date = Carbon::parse($dateString);
        $now = Carbon::now();

        $diff = $date->diff($now);

        if ($diff->y > 0) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        } elseif ($diff->m > 0) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        } elseif ($diff->d > 0) {
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        } elseif ($diff->h > 0) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        } elseif ($diff->i > 0) {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        } else {
            return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
