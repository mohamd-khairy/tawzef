<?php

namespace Modules\CMS;

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
use App\Media;
use App\User;
use Spatie\MediaLibrary\File;

class CmsManagement extends Model
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

    protected $table = 'cms_managements';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','type','created_at', 'updated_at','product_id',
        'image',
        'award_date','award_section','magazine_logo','link','title_en','title_ar','description_en','description_ar'
    ];

    protected $appends = [
        'title', 'description'
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
    protected static $logName = 'cms_managements_log';

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->translations->first() ? "CMS Managements " . $this->translations->first()->title . " has been {$eventName}" : "Cms Management #" . $this->id . " has been {$eventName}";
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() == 'en' ? $this->title_en : $this->title_ar;
    }
    public function getDescriptionAttribute()
    {
        return app()->getLocale() == 'en' ? $this->description_en : $this->description_ar;
    }


    public static function boot()
    {
        parent::boot();

        static::created(function (CmsManagement $cms_management) {
            Event::dispatch('cms_management.created', $cms_management);
        });
        static::updated(function (CmsManagement $cms_management) {
            Event::dispatch('cms_management.updated', $cms_management);
        });
        static::saved(function (CmsManagement $cms_management) {
            Event::dispatch('cms_management.saved', $cms_management);
        });
        static::deleted(function (CmsManagement $cms_management) {
            Event::dispatch('cms_management.deleted', $cms_management);
        });
        static::restored(function (CmsManagement $cms_management) {
            Event::dispatch('cms_management.restored', $cms_management);
        });
    }
}
