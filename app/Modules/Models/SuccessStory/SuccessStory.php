<?php

namespace App\Modules\Models\SuccessStory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;

    protected $table = 'tbl_success_stories';

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
