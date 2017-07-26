<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Review prediction results:</h3>
      </div>

      <div class="panel-body">
        <blockquote>{{ reviewAnalyze.providedReview }}</blockquote>

        <p>
          <strong>This review is: </strong>{{ reviewAnalyze.predictedClass }}
        </p>

        <p>
          <strong>Probability: </strong>{{ reviewAnalyze.predictedProbability }}
        </p>
      </div>

      <div class="panel-footer">
        <button type="button" class="btn btn-success">Correct</button>
        <button type="button" class="btn btn-warning">Incorrect</button>
      </div>
    </div>

    <p>
      <button type="button" class="btn btn-primary">Submit another review</button>
    </p>
  </div>
</template>

<script>
  export default {
    date() {
      return {
        reviewAnalyze: {},
      }
    },

    methods: {
      mockReviewResults() {
        return {
          providedReview: 'This movie is amazing',
          predictedProbability: '80.5%',
          predictedClass: 'positive',
        };
      }
    },

    created: function () {
      this.reviewPrediction = this.mockReviewResults();
    },
  }
</script>
