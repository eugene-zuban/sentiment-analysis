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

    created() {
      window.events.$on(
        'showAlert', data => this.showAlert(data)
      );
    },

    methods: {
      showAlert(data) {
        this.alertMessage = data.message;
        this.alertType = data.type;
        this.isAlertActive = true;

        this.hideAlert(5000);
      },

      hideAlert(delay = 0) {
        setTimeout(() => {
          this.isAlertActive = false;
        }, delay);
      }
    }
  }
</script>
