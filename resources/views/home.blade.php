@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><h4>{{$category->name}}</h4></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <span>{{trans('admin.inQueue')}}:</span>
                        <span>{{ $category->queues->count() }} </span>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group text-right">
                            <a href="{{ route('checking.start', ['category_id' => $category->id]) }}" class="btn btn-md btn-success">
                            {{trans('admin.start')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
