<?php

namespace App\MovieReview;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * @param string $reviewText
     */
    public function setText($reviewText)
    {
        $this->review = $reviewText;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->review;
    }

    /**
     * @param bool $sentiment
     */
    public function setSentiment($sentiment)
    {
        $this->sentiment = $sentiment;
    }

    /**
     * @return bool
     */
    public function isPositive()
    {
        return $this->sentiment;
    }
}
