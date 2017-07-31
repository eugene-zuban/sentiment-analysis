<?php

namespace app\MovieReview;

class ClassifiedReview
{
    /**
     * @var Review
     */
    protected $review;

    /**
     * @var float
     */
    protected $predictedProbability;

    /**
     * @param \app\MovieReview\Review $review
     */
    public function setReview(Review $review)
    {
        $this->review = $review;
    }

    /**
     * @return \app\MovieReview\Review
     */
    public function getReview()
    {
        return $this->review;
    }


    /**
     * @param float $probability
     */
    public function setPredictedProbability($probability)
    {
        $this->predictedProbability = round($probability, 2);
    }

    /**
     * @return float
     */
    public function getPredictedProbability()
    {
        return $this->predictedProbability;
    }
}
