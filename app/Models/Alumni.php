<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workshop;
class Alumni extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'firstname', 'lastname', 'gender', 'dateofbirth', 'email', 'password'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
}
