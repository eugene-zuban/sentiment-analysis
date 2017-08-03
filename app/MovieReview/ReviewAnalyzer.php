<?php

namespace App\MovieReview;

use Symfony\Component\Process\Process;

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
     * @param string $unsafeReview
     * @return ClassifiedReview
     */
    public function classify($unsafeReview)
    {
        $classifierOutput =
            $this->classifyUsingPythonApp(escapeshellcmd($unsafeReview));

        return
            $this->reviewFactory->makeUsingClassifierOutput($classifierOutput);
    }

    /**
     * @param string $cleanReview
     * @return \stdClass
     */
    protected function classifyUsingPythonApp($cleanReview)
    {
        $process = new Process("~/anaconda3/bin/python pylibs/app.py");

        $process->setWorkingDirectory(base_path());

        $process->setInput($cleanReview);

        $process->run();

        return json_decode($process->getOutput());
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
