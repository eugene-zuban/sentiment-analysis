<?php

namespace App\Transformers;

use App\MovieReview\ClassifiedReview;

/**
 * Class ClassifiedReviewTransformer
 * Transforms ClassifiedReview object into array for api-related controller
 *
 * @package App\Transformers
 */
class ClassifiedReviewTransformer
{
    public function transform(ClassifiedReview $classifiedReview)
    {
        return [
            'providedReview' =>
                $classifiedReview->getProvidedReviewText(),

            'predictedClass' =>
                $classifiedReview->isPredictedClassPositive() ?
                    'positive' : 'negative',

            'predictedProbability' =>
                $classifiedReview->getPredictedProbability() . '%',
        ];
    }
}
