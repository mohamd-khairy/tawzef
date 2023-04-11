<?php

namespace Modules\Careers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Event;
use App\Language;
use App;
use Cache;
use Wildside\Userstamps\Userstamps;
use App\User;
use Spatie\MediaLibrary\File;

class Career extends Model
{
    use SoftDeletes, SoftCascadeTrait, LogsActivity, Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    /**
     * Get the class being used to provide a User.
     *
     * @return string
     */
    protected function getUserClass()
    {
        return "App\User";
    }

    protected $table = 'careers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title_en',
        'description_en',
        'title_ar',
        'description_ar',
        'location',
        'type',
        'category_id', 'number_of_available_vacancies', 'created_at', 'updated_at'
    ];

    // Deleting translations manually to overcome laravel issue with composite primary key
    protected $softCascade = [];

    protected $appends = ['title'];

    protected $casts = [
        'services' => 'array'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = [];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $ignoreChangedAttributes = [];
    protected static $logOnlyDirty = true;
    protected static $logName = 'career_log';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Career #" . $this->id . " has been {$eventName}";
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title_ar;
    }
    // Handle IS Featured
    public function setIsFeaturedAttribute($value)
    {
        if ($value === "on") {
            $this->attributes['is_featured'] = 1;
        } else {
            $this->attributes['is_featured'] = 0;
        }
    }

    public static function boot()
    {
        parent::boot();

        static::created(function (Career $career) {
            Event::dispatch('career.created', $career);
        });
        static::updated(function (Career $career) {
            Event::dispatch('career.updated', $career);
        });
        static::saved(function (Career $career) {
            Event::dispatch('career.saved', $career);
        });
        static::deleted(function (Career $career) {
            Event::dispatch('career.deleted', $career);
        });
        static::restored(function (Career $career) {
            Event::dispatch('career.restored', $career);
        });
    }
}
