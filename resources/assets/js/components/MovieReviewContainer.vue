<template>
  <div>
    <review-form v-if="isReviewStage()"></review-form>
  </div>
</template>

<script>
  import ReviewForm from './ReviewForm.vue';

  export default {
    data() {
      return {
        stage: ''
      };
    },

    methods: {
      isReviewStage() {
        return this.stage == 'review';
      },

      activateReviewForm() {
        this.stage = 'review';
      }
    },

    created() {
      this.activateReviewForm();
    },

    components: { ReviewForm }
  }
</script>
