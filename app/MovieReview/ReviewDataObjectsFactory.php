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
}
