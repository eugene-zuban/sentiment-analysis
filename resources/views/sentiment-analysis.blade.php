@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div clas="col-md-12" role="main">
                <div class="page-header">
                    <h1>Movie classifier<small> based on logistic regression model.</small></h1>
                </div>

                <movie-review></movie-review>
            </div>
        </div>
    </div>
@endsection
