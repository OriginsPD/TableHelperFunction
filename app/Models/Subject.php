<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'subject_nm',
        'cost_amt',
    ];

    public function subjectChoice(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubjectChoice::class, 'subject_id');
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class,'subject_id');
    }
}
