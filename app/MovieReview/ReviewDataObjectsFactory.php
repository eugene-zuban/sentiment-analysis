<?php

namespace App\MovieReview;

/**
 * Class ReviewDataObjectsFactory
 * Provides an interface for making Review & ClassifiedReview data objects
 *
 * @package app\MovieReview
 */
class ReviewDataObjectsFactory
{
    /**
     * @return \app\MovieReview\Review
     */
    public function makeEmptyReview()
    {
        return new Review();
    }

    /**
     * @return \app\MovieReview\ClassifiedReview
     */
    public function makeEmptyClassifiedReview()
    {
        return new ClassifiedReview($this->makeEmptyReview());
    }

    /**
     * @param \stdClass $classifierOutput
     * @return \App\MovieReview\ClassifiedReview
     */
    public function makeUsingClassifierOutput($classifierOutput)
    {
        $review = new ClassifiedReview($this->makeEmptyReview());

        $review->setProvidedReviewText($classifierOutput->review);

        $review->setPredictedClass($classifierOutput->is_positive);

        $review->setPredictedProbability($classifierOutput->probability);

        return $review;
    }
}
