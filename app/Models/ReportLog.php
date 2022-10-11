<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportLog extends Model
{
    use HasFactory;
    protected $fillable =   [
        'report_id',
        'report_image_id',
        'image_old_status',
    ];

    public function report(){
        return $this->belongsTo(Report::class);
    }
    public function image(){
        return $this->belongsTo(Image::class);
    }
}
