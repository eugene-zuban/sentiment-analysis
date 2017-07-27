<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AddMovieReviewRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProcessMovieReviewRequest;

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
     * @return \Illuminate\Http\Response
     */
    public function post(ProcessMovieReviewRequest $request)
    {
        $review = $request->input('review');

        return response()->json(
            [
                'providedReview' => $review,
                'predictedClass' => 'positive',
                'predictedProbability' => '80.0%'
            ]
        );
    }
}
