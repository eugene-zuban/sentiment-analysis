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
        $classifierOutput = $this->classifyUsingPythonApp($unsafeReview);

        return
            $this->reviewFactory->makeUsingClassifierOutput($classifierOutput);
    }

    /**
     * @param string $review
     * @return \stdClass
     */
    protected function classifyUsingPythonApp($review)
    {
        $python = config('app.python_path');

        $process = new Process("{$python} pylibs/app.py");

        $process->setWorkingDirectory(base_path());

        $process->setInput($review);

        $process->run();

        return json_decode($process->getOutput());
    }
}
