<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Media;
class timeTable extends Model
{
    //
    use SoftDeletes, HasMediaTrait;
    public $table = 'time_table';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'time'
    ];
    protected $fillable = [
        'time',
    ];

    public function timetableDoctors ()
    {
        return $this->belongsToMany(doctors::class);
    }
}
