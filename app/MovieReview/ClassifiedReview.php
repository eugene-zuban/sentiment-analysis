<?php

namespace App\MovieReview;

/**
 * Class ClassifiedReview
 * A container object using during a review classification (prediction) process
 * and stores Review data along with predicted probability.
 *
 * @package App\MovieReview
 */
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
     * ClassifiedReview constructor.
     * ClassifiedReview must be initialized with a Review object.
     *
     * @param \App\MovieReview\Review $review
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Set analyzed review text.
     *
     * @param string $reviewText
     */
    public function setProvidedReviewText($reviewText)
    {
        $this->review->setText($reviewText);
    }

    /**
     * Return original/provided review text.
     *
     * @return string
     */
    public function getProvidedReviewText()
    {
        return $this->review->getText();
    }

    /**
     * Set positive or negative predicted label.
     *
     * @param bool $isPositive
     */
    public function setPredictedClass($isPositive = true)
    {
        $this->review->setSentiment($isPositive);
    }

    /**
     * Returns predicted class label.
     * We are using bool so predicted class can be positive or negative only.
     *
     * @return bool
     */
    public function isPredictedClassPositive()
    {
        return $this->review->isPositive();
    }

    /**
     * Set probability that class label is correct.
     *
     * @param float $probability
     */
    public function setPredictedProbability($probability)
    {
        $this->predictedProbability = round($probability, 2);
    }

    /**
     * Get probability that class label is correct.
     *
     * @return float
     */
    public function getPredictedProbability()
    {
        return $this->predictedProbability;
    }

    /**
     * Return the current Review object.
     * It's a service method in case if we want to get Review object directly.
     *
     * @return \app\MovieReview\Review
     */
    public function getReview()
    {
        return $this->review;
    }
}
