<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyAnswersRequest;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class SurveyController extends Controller
{
    /**
     * @param Questionnaire $questionnaire
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(SurveyAnswersRequest $request, Questionnaire $questionnaire)
    {
        $survey = $questionnaire->surveys()->create($request->get('survey'));
        $survey->responses()->createMany($request->get('responses'));

        return 'Thank you';
    }
}
