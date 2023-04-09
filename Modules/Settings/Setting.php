<?php

namespace Modules\Settings;

use Illuminate\Database\Eloquent\Model;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Facades\Event;

class Setting extends Model
{
    use SoftDeletes, SoftCascadeTrait, LogsActivity, Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    protected $table = 'settings';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * Get the class being used to provide a User.
     *
     * @return string
     */
    protected function getUserClass()
    {
        return "App\User";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'tags_manager',
        'pixel_code',
        'enable_ar',
        'our_vision_en',
        'our_vision_ar',
        'our_mission_en',
        'our_mission_ar',
        'our_value_en',
        'our_value_ar',
        'map'
        ,
        'created_at', 'updated_at'
    ];

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
    protected static $logName = 'setting_log';

    /*
     * Types <careers,setting_us,phone,email>
     */

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Setting " . $this->type . " of ID #" . $this->id . " has been {$eventName}";
    }

    public function setEnableArAttribute($value)
    {
        if ($value === "on") {
            $this->attributes['enable_ar'] = 1;
        } elseif ($value == "off") {
            $this->attributes['enable_ar'] = 0;
        }
    }
}
