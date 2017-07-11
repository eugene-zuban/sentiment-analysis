<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Please enter your movie review:</h3>
    </div>
    <div class="panel-body">
      <form @submit.prevent="sendReview">
        <div class="form-group">
          <textarea id="review-input" class="form-control" rows="3"
                    placeholder="Movie review minimum 15 characters length"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Review</button>
        <button class="btn btn-primary" @click="getTestData">Get test data</button>
      </form>
    </div>

    <div v-if="testData">{{ testData }}</div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        testData: ''
      };
    },

    methods: {
      sendReview() {
        // TODO implementation
      },

      getTestData() {
        axios.get('movie-review')
          .then((response) => {
            console.log(response);
            this.testData = response.data.text;
          })
      }
    }
  }
</script>
