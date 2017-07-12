<template>
  <div v-if="isAlertActive" class="alert" :class="'alert-'+alertType" role="alert">
    {{ alertMessage }}
  </div>
</template>

<script>
  export default {
    data() {
      return {
        alertMessage: '',
        alertType: 'success',
        isAlertActive: false,
      }
    },

    methods: {
      showAlert() {
        this.isAlertActive = true;
      },

      hideAlert() {
        this.isAlertActive = false;
      }
    }
  }
</script>
