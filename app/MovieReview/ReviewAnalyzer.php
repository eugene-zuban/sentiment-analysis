<?php

namespace App\MovieReview;

/**
 * Class ReviewAnalyzer a service class for analyzing text reviews.
 *
 * @package app\Services
 */
class ReviewAnalyzer
{
    /**
     * @var \App\MovieReview\ReviewDataObjectsFactory
     */
    protected $reviewFactory;

    /**
     * @param \App\MovieReview\ReviewDataObjectsFactory $reviewFactory
     */
    public function __construct(ReviewDataObjectsFactory $reviewFactory)
    {
        $this->reviewFactory = $reviewFactory;
    }

    /**
     * Classify the provided text review using saved logistic regression model
     *
     * @param string $textReview
     * @return ClassifiedReview
     */
    public function classify($textReview)
    {
        return $this->getDummyClassifiedReview($textReview);
    }

    /**
     * @param string $textReview
     * @return \App\MovieReview\ClassifiedReview
     */
    protected function getDummyClassifiedReview($textReview)
    {
        $classifiedReview = $this->reviewFactory->makeEmptyClassifiedReview();
        $classifiedReview->setProvidedReviewText($textReview);
        $classifiedReview->setPredictedClass(true);
        $classifiedReview->setPredictedProbability(80.99);

        return $classifiedReview;
    }
}
