@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>{{ $questionnaire->title }}</h1>

                <form action="#" method="post">
                    @csrf
                    @foreach($questionnaire->questions as $key => $question)
                        <div class="card mt-4">
                            <div class="card-header"><strong>{{ $loop->iteration }}</strong> {{ $question->question }}</div>

                            <div class="card-body">
                                @error('responses.'.$key.'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input class="mr-2" type="radio"
                                                       name="responses[{{ $key }}][answer_id]"
                                                       id="answer{{ $answer->id }}"
                                                       {{ (old('responses.'.$key.'.answer_id')) == $answer->id ? 'checked' : '' }}
                                                       value="{{ $answer->id }}">
                                                {{ $answer->answer }}
                                                <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    <div class="card mt-4">
                        <div class="card-header">Your Information</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Enter Your Name.</small>

                                @error('survey.name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email">
                                <small id="emailHelp" class="form-text text-muted">Type Your Email.</small>

                                @error('survey.email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-dark mt-4" type="submit">Complete Survey</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
