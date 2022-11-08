<?php

namespace App\Modules\Models\Slider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'tbl_sliders';

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
