<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController
    extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post) {

        $data = $request->validated();

        $this->service->update($post, $data);

        return $post instanceof Post ? PostResource($post) : $post;

        //return to_route('post.show', ['post' => $post->id]);
       // return redirect()->route('post.show', $post->id);
    }
}
