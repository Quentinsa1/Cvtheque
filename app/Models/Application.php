<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'poste', 'societe', 'candidate_name', 'date_naissance',
        'nationalite', 'formation', 'experience', 'langues', 'projet',
        'piece_identite', 'diplomes', 'attestations', 'cv'
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
