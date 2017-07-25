<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Review prediction results:</h3>
      </div>

      <div class="panel-body">
        <blockquote>{{ reviewResults.submittedReview }}</blockquote>

        <p>
          <strong>This review is: </strong>{{ reviewResults.predictedClass }}
        </p>

        <p>
          <strong>Probability: </strong>{{ reviewResults.predictionProbability }}
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
        reviewResults: {},
      }
    },

    methods: {
      mockReviewResults() {
        return {
          submittedReview: 'This movie is amazing',
          predictionProbability: '80.5%',
          predictedClass: 'positive',
        };
      }
    },

    created: function () {
      this.reviewResults = this.mockReviewResults();
    },
  }
</script>
