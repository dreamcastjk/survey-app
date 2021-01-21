@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $questionnaire->title }}</div>

                    <div class="card-body">
                        <a class="btn btn-dark" href="{{ route('questionnaire.questions.create', $questionnaire) }}">Add new question</a>
                        <a class="btn btn-dark" href="{{ route('survey.show', [$questionnaire, Str::slug($questionnaire->title)] ) }}">Take Survey</a>
                    </div>

                </div>

                @foreach($questionnaire->questions as $question)
                    <div class="card mt-4">
                        <div class="card-header">{{ $question->question }}</div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>{{ $answer->answer }}</div>
                                        <div>{{ $answer->percentage }}%</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                            <form action="{{ route('questionnaire.questions.destroy', [$questionnaire, $question]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
