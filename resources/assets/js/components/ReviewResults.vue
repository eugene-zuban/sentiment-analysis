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
        <button type="button" class="btn btn-success" @click="correctPrediction()">Correct</button>
        <button type="button" class="btn btn-warning" @click="incorrectPrediction()">Incorrect</button>
      </div>
    </div>

    <p>
      <button @click="showMovieReviewForm()" type="button" class="btn btn-primary">Submit another review</button>
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

    methods: {
      showMovieReviewForm() {
        this.$emit('changeStage', 'init');
      },

      correctPrediction() {
        this.sendFeedback(
          this.predictionResults.providedReview,
          this.predictionResults.predictedClass == 'positive' ? 1 : 0
        );
      },

      incorrectPrediction() {
        this.sendFeedback(
          this.predictionResults.providedReview,
          this.predictionResults.predictedClass == 'positive' ? 0 : 1
        );
      },

      sendFeedback(reviewText, isPositive) {
        axios.post('/api/add-movie-review', {
            reviewText: reviewText,
            sentiment: isPositive,
          })
          .then(() => {
            window.showAlert('Thank you for your feedback!');
          })
          .catch(() => {
            window.showAlert('Oops, something went wrong...', 'danger');
          });

        this.$emit('changeStage', 'init');
      }
    },

    props: ['predictionResults'],
  }
</script>
