<!--
Component Content：ホーム画面用
parent-component：AppComponent
child-component：HomeOverview|HomeList
-->

<template>
  <div>
    <HomeOverview ref="homeOverview"></HomeOverview>
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
    showAlert: function (resdate = '') {
      if (this.message !== undefined || resdate !== '') {
        let resultData = "";
        // ルーティングでpushされてきた場合
        if (resdate === '') {
          resultData = this.message;
        } else {
          // emitで起動した場合
          resultData = resdate;
        }

        // ステータスがfalseの場合
        if (!resultData.status) {
          this.alertType = 'error';
        }

        //メッセージを設定
        this.alertMessage = resultData.message;

        // メッセージを表示
        this.showAlertFlg = true;

        // homeOverviewを更新
        this.$refs.homeOverview.initPage()
        //3秒後に削除
        setTimeout(function () {
          this.showAlertFlg = false;
        }.bind(this), 3000)
      }
    },
  },
  mounted: function () {
    this.showAlert();
  }
}
</script>