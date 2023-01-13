<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamImg extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function about()
    {
        return $this->belongsTo(About::class, 'about_id', 'id');
    }
}
