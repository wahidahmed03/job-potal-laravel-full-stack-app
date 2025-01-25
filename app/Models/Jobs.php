<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'location',
        'level',
        'salary',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobApplications()
    {
        return $this->hasMany(JobsApplicationS::class, 'job_id');
    }
}

