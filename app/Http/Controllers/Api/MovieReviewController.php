<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddMovieReviewRequest;
use App\Http\Controllers\Controller;

class MovieReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param AddMovieReviewRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMovieReviewRequest $request)
    {
        return response()->json(['status' => 'Review has been added.']);
    }
}
