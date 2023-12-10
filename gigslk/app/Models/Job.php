<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        // Add more attributes as needed
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Add any casting rules if needed
    ];

    /**
     * Get the user who created the job.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Add more relationships or methods as needed
}
