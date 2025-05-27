<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For slug generation

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all posts, ordered by creation date, paginated for better performance
        $posts = Post::latest()->paginate(10); // Or Post::all(); for all posts

        // Return the view with the posts data
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for the post creation form
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
        ]);

        // Create the new post
        Post::create($validatedData);

        // Redirect with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        // Return the view with the specific post data
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        // Return the view for the post editing form
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
        ]);

        // Generate slug only if title has changed or slug is not set
        if ($post->title !== $validatedData['title'] || empty($post->slug)) {
            $validatedData['slug'] = Str::slug($validatedData['title']);

            // Ensure the slug is unique, excluding the current post
            $originalSlug = $validatedData['slug'];
            $count = 1;
            while (Post::where('slug', $validatedData['slug'])->where('id', '!=', $post->id)->exists()) {
                $validatedData['slug'] = $originalSlug . '-' . $count++;
            }
        }


        // Update the post
        $post->update($validatedData);

        // Redirect with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        // Delete the post (this will soft delete due to SoftDeletes trait)
        $post->delete();

        // Redirect with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
