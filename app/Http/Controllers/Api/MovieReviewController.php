<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddMovieReviewRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProcessMovieReviewRequest;
use App\MovieReview\ReviewAnalyzer;

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

    /**
     * Process review form submission.
     *
     * @param ProcessMovieReviewRequest $request
     * @param ReviewAnalyzer $reviewAnalyzer
     * @return \Illuminate\Http\Response
     */
    public function post(
        ProcessMovieReviewRequest $request,
        ReviewAnalyzer $reviewAnalyzer
    ) {
        $processedReview = $reviewAnalyzer->classify($request->input('review'));

        return response()->json($processedReview);
    }
}
