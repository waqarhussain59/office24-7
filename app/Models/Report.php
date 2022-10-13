<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable =   [
        'title',
        'remarks',
        'status',
        'petitioner',
        'writ_petition_no',
        'images',
        'created_user_id',
//        'updated_user_id'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function image(){
        return $this->hasMany(Image::class);
    }
    public function remarkss()
    {
        return $this->hasMany(Remark::class);
    }
    public function reportLog(){
        return $this->hasMany(ReportLog::class);
    }
}
