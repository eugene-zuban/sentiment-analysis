<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Please enter your movie review:</h3>
    </div>
    <div class="panel-body">
      <form @submit.prevent="sendReview">
        <div class="form-group">
          <textarea id="review-input"
                    class="form-control"
                    rows="3"
                    placeholder="Movie review minimum 15 characters length"
                    v-model="review">
          </textarea>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="isSubmitDisabled()">Send Review</button>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        review: ''
      };
    },

    methods: {
      sendReview() {
        axios.post('/api/process-movie-review', {review: this.review})
          .then((response) => {
            this.$emit('changeStage', 'result');
            this.$emit('reviewProcessed', response.data);
          })
          .catch((error) => {
            if (error.response.data.review) {
              window.showAlert(_.head(error.response.data.review), 'danger');
            } else {
              window.showAlert(error.response.statusText, 'danger');
            }
          })
      },

      isSubmitDisabled() {
        return this.review.length < 15;
      }
    }
  }
</script>
