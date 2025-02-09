<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreController
    extends BaseController
{
    public function __invoke(StoreRequest $request) {

        $data = $request->validated();

        $post = $this->service->store($data);

        return $post instanceof Post ? PostResource($post) : $post;

        //return redirect()->route('post.index');
    }
}
