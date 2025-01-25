<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobsApplicationS extends Model
{
   protected $fillable = [
    'user_id',
    'job_id',
    'status',
    'CompanyId',
   ];


   public function job()
   {
       return $this->belongsTo(Jobs::class, 'job_id');
   }

   public function user()
   {
       return $this->belongsTo(User::class, 'user_id');
   }

}

