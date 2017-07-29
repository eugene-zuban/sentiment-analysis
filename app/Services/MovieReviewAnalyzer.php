<?php

namespace App\Services;

/**
 * Class MovieReviewAnalyzer a service class for analyzing text reviews.
 *
 * @package app\Services
 */
class MovieReviewAnalyzer
{
    /**
     * @param string $textReview
     * @return object
     */
    public function analyze($textReview)
    {
        return (object) [
            'providedReview' => $textReview,
            'predictedClass' => 'positive',
            'predictedProbability' => '80.0%',
        ];
    }
}
