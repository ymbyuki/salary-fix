<!--
Component Content：ホーム画面用
parent-component：AppComponent
child-component：HomeOverview|HomeList
-->

<template>
  <div>
    <HomeOverview></HomeOverview>
    <HomeList @showAlert="showAlert"></HomeList>
    <transition name="fade">
      <v-alert :type="alertType" id="alert" v-show="showAlertFlg">{{ alertMessage }}</v-alert>
    </transition>
  </div>
</template>

<script>
import HomeOverview from './HomeOverview.vue';
import HomeList from './HomeList.vue';

export default {
  components: {
    HomeOverview,
    HomeList
  },
  data: function () {
    return {
      alertMessage: '', //アラートメッセージ
      alertType: 'success', //アラート内容
      showAlertFlg: false, //アラートを表示するかどうか
    }
  },
  props: ['message'],
  methods: {
    toggleMessage: function () {
      if (this.message) {
        let resdate = this.message;
        this.alertMessage = resdate.message;
        if (!resdate.status) {
          this.alertType = 'error';
        }
        this.showAlertFlg = true;

        //3秒後に削除
        setTimeout(function () {
          this.showAlertFlg = false;
        }.bind(this), 3000)
      }
    },
    showAlert: function (resdate) {
      this.alertMessage = resdate.message;
      if (!resdate.status) {
        this.alertType = 'error';
      }
      this.showAlertFlg = true;

      //3秒後に削除
      setTimeout(function () {
        this.showAlertFlg = false;
      }.bind(this), 3000)
    },

  },
  mounted: function () {
    this.toggleMessage();
  }
}
</script>