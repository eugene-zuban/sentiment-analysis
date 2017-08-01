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
        $this->text = $reviewText;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
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
