<template>
  <div>
    <review-form v-if="isCurrentStage('init')" v-on:changeStage="setStage"></review-form>

    <review-results v-if="isCurrentStage('result')"></review-results>
  </div>
</template>

<script>
  import ReviewForm from './ReviewForm.vue';
  import ReviewResults from './ReviewResults.vue';

  export default {
    data() {
      return {
        stage: ''
      };
    },

    methods: {
      isCurrentStage(checkingStage) {
        return this.stage == checkingStage;
      },

      setStage(stage) {
        this.stage = stage;
      }
    },

    created() {
      this.setStage('init');
    },

    components: { ReviewForm, ReviewResults }
  }
</script>
