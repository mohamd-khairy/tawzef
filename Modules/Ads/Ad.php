<?php

namespace Modules\Ads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Language;
use App;
use Cache;
use Wildside\Userstamps\Userstamps;
use App\User;
use Spatie\MediaLibrary\File;

class Ad extends Model
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

    protected $table = 'ads';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'link', 'title_ar',
        'sub_title_en',
        'sub_title_ar', 'is_featured', 'start_date', 'end_date', 'image', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'name'
    ];

    // protected $softCascade = ['translations'];
    // Deleting translations manually to overcome laravel issue with composite primary key
    protected $softCascade = [];

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
    protected static $logName = 'ad_log';

    public function getDescriptionForEvent(string $adName): string
    {
        return "Ad #" . $this->id . " has been {$adName}";
    }

    public function getNameAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title : $this->title_ar;
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

        static::created(function (Ad $ad) {
            \Illuminate\Support\Facades\Event::dispatch('ad.created', $ad);
        });
        static::updated(function (Ad $ad) {
            \Illuminate\Support\Facades\Event::dispatch('ad.updated', $ad);
        });
        static::saved(function (Ad $ad) {
            \Illuminate\Support\Facades\Event::dispatch('ad.saved', $ad);
        });
        static::deleted(function (Ad $ad) {
            \Illuminate\Support\Facades\Event::dispatch('ad.deleted', $ad);
        });
        static::restored(function (Ad $ad) {
            \Illuminate\Support\Facades\Event::dispatch('ad.restored', $ad);
        });
    }
}
