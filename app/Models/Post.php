<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post
    extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;//разрешить запись атрибутов в бд
    // protected $fillable =[];//защита от записи в бд

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }
}
