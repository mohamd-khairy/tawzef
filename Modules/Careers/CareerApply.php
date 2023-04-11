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

class CareerApply extends Model
{
    use SoftDeletes, SoftCascadeTrait, LogsActivity;

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

    protected $table = 'career_applies';
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'applied_by',
        'career_id',
        'resume',
        'full_name',
        'email',
        'phone',
        'message', 'created_at', 'updated_at'
    ];

    // Deleting translations manually to overcome laravel issue with composite primary key
    protected $softCascade = [];


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

    public function career()
    {
       return $this->belongsTo(Career::class,'career_id');
    }
}
