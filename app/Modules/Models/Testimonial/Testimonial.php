<?php

namespace App\Modules\Models\Testimonial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

    use HasFactory;

    protected $table = 'tbl_testimonials';

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
