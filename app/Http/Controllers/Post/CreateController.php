<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreateController
    extends BaseController
{
    public function __invoke() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));

    }

}
