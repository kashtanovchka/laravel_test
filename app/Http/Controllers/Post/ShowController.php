<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShowController
    extends BaseController
{
    public function __invoke(Post $post, Request $request) {

        return $request->is('api/*') ? new PostResource($post): view('post.show', compact('post'));

    }
}
