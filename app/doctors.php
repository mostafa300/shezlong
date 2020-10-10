<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Media;
use App\timeTable;
class doctors extends Model
{
        use SoftDeletes, HasMediaTrait;

    public $table = 'doctors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RATEING_SELECT = [
        '5' => 'excellent',
        '4' => 'very good',
        '3'      => 'good',
        '2'    => 'normal',
        '1'       => 'bad',
    ];

    protected $fillable = [
        'name',
        'description',
        'language',
        'country',
        'join_at',
        'major',
        'profile',
        'rateing',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function timetables()
    {
        return $this->belongsToMany(timeTable::class);
    }
}
