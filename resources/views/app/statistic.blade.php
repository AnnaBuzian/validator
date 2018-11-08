@extends('layouts.app')

@section('content')
    <div class="container">
        <dyv clas="row">
            <div>
                <div class="text-center">
                    <img src="{{$contentImage}}" class="rounded" alt="...">
                </div>
            </div>
        </dyv>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{ Form::open(array('url' => route('checking.finish', ['category_id' => $queue->category->id]))) }}
                @foreach($questions as $question)
                    {{ Form::label($question->question, '', '', ['class' => 'control-label']) }}
                    @foreach($question->answers as $answer)
                        <label>	{!! Form::radio($answer->name, null,  null, ['id' => $answer->id]) !!}	</label> }}
                    @endforeach
                @endforeach
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
