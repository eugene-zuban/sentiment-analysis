<template>
  <div>
    <review-form v-if="isCurrentStage('init')" v-on:changeStage="setStage"></review-form>

    <div v-if="isCurrentStage('result')">Result stage.</div>
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

    components: { ReviewForm }
  }
</script>
