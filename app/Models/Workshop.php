<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumni;
class Workshop extends Model
{
    protected $fillable = [
        'alumni_id', 'WorkshopName', 'WorkshopDecription', 'WorkshopDateAndTime', 'WorkshopLocation', 'accepted'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
