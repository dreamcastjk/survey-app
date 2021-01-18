<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionnareRequest;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(QuestionnareRequest $request)
    {
        $questionnaire = auth()->user()->questionnaires()->create($request->validated());

        return redirect(route('questionnaire.show', $questionnaire->id));
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaire.show', compact('questionnaire'));
    }
}
