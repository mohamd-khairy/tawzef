<?php

namespace Modules\Categories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Careers\Career;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'parent_id',
        'title_en',
        'title_ar',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',

    ];
    protected $appends = ['title'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function sub_category()
    {
        return $this->belongsTo(self::class, 'parent_id', 'parent_id');
    }
    public function getTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title_ar;
    }

    public function careers()
    {
        return $this->hasMany(Career::class, 'category_id');
    }
}
