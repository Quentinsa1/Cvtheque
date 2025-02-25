<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'poste', 'candidate_name', 'date_of_birth', 'nationality',
        'education', 'experience', 'languages', 'projects', 'id_card',
        'diplomas', 'certificates', 'cv', 'societe'
    ];


    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
