<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'description',
        'reporter_email',
        'user_name',
        'user_email',
        'report_token'
    ];
}
