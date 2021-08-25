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
      <p>Еще нет аккаунта? <a href="/register">Зарегистрируйтесь</a></p>
      <button class="btn btn-success" :disabled="!isFormValid">Войти</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "Login",
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
      return (this.isPhoneValid && !!this.phone.length &&
          this.isPasswordValid && !!this.password.length);
    }
  }
}
</script>
