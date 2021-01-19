<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(QuestionRequest $request, Questionnaire $questionnaire)
    {
        $question = $questionnaire
            ->questions()
            ->create($request->get('question'));

        $question->answers()->createMany($request->get('answers'));

        return redirect(route('questionnaire.show', $questionnaire));
    }
}
