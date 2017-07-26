<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Review prediction results:</h3>
      </div>

      <div class="panel-body">
        <blockquote>{{ predictionResults.providedReview }}</blockquote>

        <p>
          <strong>This review is: </strong>{{ predictionResults.predictedClass }}
        </p>

        <p>
          <strong>Probability: </strong>{{ predictionResults.predictedProbability }}
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
        predictionResults: {
          providedReview: '',
          predictedProbability: '',
          predictedClass: '',
        },
      }
    },

    props: ['predictionResults'],
  }
</script>
