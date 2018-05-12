<template>
  <div class="login">
    <img src="../../images/background.jpg" class="login-img">
    <div class="login-container">
      <div class="login-container-account">
        <h5 class="login-container-account-title">LOGIN</h5>
        <input class="login-container-account-input" type="text" name="username" id="username" placeholder="@username">
        <input class="login-container-account-input" type="password" name="password" id="password" placeholder="password">
        <button class="login-container-account-button">GO!</button>
      </div>
      <div class="login-container-social">
        <button class="login-container-social-button facebook">
          <i class="fab fa-facebook-f"></i> Login with facebook
        </button>
        <button class="login-container-social-button twitter">
          <i class="fab fa-twitter"></i> Login with twitter
        </button>
        <span>Forgot your password?</span>
        <span>Create an acccount</span>
      </div>
      <div class="login-container-arrow">
        <i class="fas fa-chevron-down"></i>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
  @import "../../sass/_variables";
  .login{
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    &-img{
      width: 100%;
      height: auto;
    }
    &-container {
      position: absolute;
      top: $login-top;
      right: $login-right;
      width: $login-width;
      height: $login-height;
      max-height: 100vh;
      border-radius: 10px;
      box-shadow: 2px 2px 8px 1px $color-black-alpha, 
                  -2px -2px 8px 1px $color-black-alpha;
      overflow: hidden;
      &-account,&-social{
        height: 50%;
        width: 100%;
        display: grid;
        align-items: center;
        justify-items: center;
      }
      &-account {
        background-color: $color-primary-alpha;
        padding-top: 40px;
        padding-bottom: 40px;
        grid-template-rows: 1.5rem repeat(3, 1fr);
        &-title {
          color: $color-white;
          margin-bottom: 0;
        }
        &-input {
          border: none;
          border-radius: 10px;
          text-align: center;
          padding: 5px 30px;
        }
        &-button{
          background: transparent;
          border: 1px solid $color-white;
          color: $color-white;
          border-radius: 10px;
          padding: 5px 45px;
          cursor: pointer;
        }
      }
      &-social {
        background-color: $color-white;
        padding-top: 40px;
        padding-bottom: 40px;
        grid-template-rows: repeat(2, 1fr) repeat(2, 1.8rem);
        &-button{
          border: none;
          border-radius: 10px;
          width: 200px;
          padding-top: 8px;
          padding-bottom: 8px;
          color: $color-white;
          cursor: pointer;
          &.facebook{
            background-color: $color-facebook;
          }&.twitter{
            background-color: $color-twitter;
          }
          & i {
            font-size: 1.3rem;
            margin-right: 10px;
          }
        }
      }
      &-arrow {
        position: absolute;
        background-color: $color-white;
        box-shadow: 1px 1px 2px 1px rgba(0,0,0,.2),
                    -1px -1px 2px 1px rgba(0,0,0,.2);
        color: $color-primary-dark;
        height: 50px;
        width: 50px;
        text-align: center;
        font-size: 25px;
        font-weight: 100;
        line-height: 50px;
        border-radius: 50%;
        top: calc(50% - 25px);
        right: calc(50% - 25px);
      }
    }
  }
</style>


