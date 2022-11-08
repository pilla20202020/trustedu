<?php

namespace App\Modules\Models\WhySweden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhySweden extends Model
{
    use HasFactory;

    protected $table = 'tbl_why_swedens';

    protected $fillable = [
        'name',
        'description',
        'link',
        'image',
        'display_order',
        'remarks',
        'status',
        'created_by',
        'created_on',
    ];


}
