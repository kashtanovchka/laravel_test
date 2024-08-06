<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data) {

        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryId($category);
            $tagTds = $this->getTagIds($tags);

            $post = Post::create($data);
            $post->tags()->attach($tagTds);

            DB::commit();

        } catch(\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return $post;
    }

    public function update($post, $data) {

        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $data['category_id'] = $this->getCategoryIdWithUpdate($category);
            $tagTds = $this->getTagIdsWithUpdate($tags);

            $post->update($data);
            $post->tags()->sync($tagTds);

            DB::commit();

        } catch(\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return $post->fresh();

    }

    private function getCategoryId($item) {

        $category = !isset($item['id']) ? Category::create($item) : Category::fing($item['id']);

        return $category->id;
    }

    private function getCategoryIdWithUpdate($item) {

        if(!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::fing($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }

        return $category->id;
    }

    private function getTagIds($tags) {

        $tagIds = [];

        foreach($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }

    private function getTagIdsWithUpdate($tags) {

        $tagIds = [];

        foreach($tags as $tag) {

            if(!isset($tag['id'])) {
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }

            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }
}
