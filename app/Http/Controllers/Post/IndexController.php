<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexController
    extends BaseController
{
    /**
     * @throws AuthorizationException
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request) {

        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? config('app.per_page');

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)
            ->paginate($perPage, ['*'], 'page', $page)
            ->onEachSide(config('app.on_each_side'));

        return $request->is('api/*') ?
            PostResource::collection($posts) :
            view('post.index', compact('posts'));
    }
}
