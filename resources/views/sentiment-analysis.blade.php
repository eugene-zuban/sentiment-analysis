@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12" role="main">
            <div class="page-header">
                <h1>Movie Review Analyzer<small> with Logistic Regression Classifier.</small></h1>
            </div>

            <alert></alert>

            <movie-review></movie-review>
        </div>
    </div>
@endsection
