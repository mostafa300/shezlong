<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Media;
class booking extends Model
{
    use SoftDeletes, HasMediaTrait;
    public $table = 'bookings';
    //name,email,phone,doctorName,doctorId,date

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'doctorName',
        'doctorId',
        'date'
    ];
}
