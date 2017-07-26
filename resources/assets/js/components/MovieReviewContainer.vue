<template>
  <div>
    <review-form v-if="isCurrentStage('init')" v-on:changeStage="setStage" v-on:reviewProcessed="setPredictionResults"></review-form>

    <review-results :review-analyze="predictionResults" v-if="isCurrentStage('result')"></review-results>
  </div>
</template>

<script>
  import ReviewForm from './ReviewForm.vue';
  import ReviewResults from './ReviewResults.vue';

  export default {
    data() {
      return {
        stage: '',
        predictionResults: {},
      };
    },

    methods: {
      isCurrentStage(checkingStage) {
        return this.stage == checkingStage;
      },

      setStage(stage) {
        this.stage = stage;
      },

      setPredictionResults(results) {
        this.predictionResults = results;
      }
    },

    created() {
      this.setStage('init');
    },

    components: { ReviewForm, ReviewResults }
  }
</script>
