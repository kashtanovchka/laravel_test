<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      // dd($collection);
        foreach($collection as $item){
            if(isset($item['zagolovok']) && $item['zagolovok'] != null){
                Post::firstOrCreate([
                    'title'=>$item['zagolovok'],
                ],[
                    'title'=>$item['zagolovok'],
                    'content'=>$item['kontent'],
                ]);
            }

        }
    }
}
