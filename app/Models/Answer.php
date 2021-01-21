<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

    public function getPercentageAttribute()
    {
        if (!$questionResponses = $this->question->responses()->count()) {
            return 0;
        }

        return intval($this->responses()->count() * 100 / $questionResponses);
    }
}
