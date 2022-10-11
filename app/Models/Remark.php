<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;
    protected $fillable =   [
        'report_id',
        'para_no',
//        'paras',
        'comments',
    ];



    public function reports()
    {
        return $this->belongsTo(Report::class);
    }
}
