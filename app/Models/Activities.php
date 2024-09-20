<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activities extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table
    protected $table = 'activities';
    // fillable
    protected $fillable = [
        'user_id',
        'date',
        'task_description',
        'status',
    ];
    // relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
