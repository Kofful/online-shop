<template>
  <form class="login-form" method="post">
    <div class="input-data">
      <label for="phone-input">Номер телефона</label>
      <input id="phone-input" name="phone"
             :class="{'login-input form-control': true, 'is-invalid': !isPhoneValid}"
             type="text" autocomplete="off" v-model="phone">
      <label for="password-input">Пароль</label>
      <input id="password-input" name="password"
             :class="{'login-input form-control': true, 'is-invalid': !isPasswordValid}"
             type="password" v-model="password">
    </div>
    <div class="link-div">
      <p>Уже есть аккаунт? <a href="/login">Вход</a></p>
      <button class="btn btn-success" :disabled="!isFormValid">Зарегистрироваться</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "Register",
  data: () => ({
    phone: "",
    password: "",
    isPhoneValid: true,
    isPasswordValid: true
  }),
  watch: {
    phone(newValue) {
      this.isPhoneValid = newValue.match(/^\+?[0-9]{10,13}$/);
    },
    password(newValue) {
      this.isPasswordValid = newValue.length >= 4;
    }
  },
  computed: {
    isFormValid() {
      return (this.isPhoneValid && !!this.phone &&
          this.isPasswordValid && !!this.password);
    }
  }
}
</script>
