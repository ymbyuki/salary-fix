<!--
Component Content：給与履歴
parent-component：Home
child-component：modal
-->
<template>
    <div class="py-12">
        <div class="bg-blue-900 p-2 text-center text-white">
            <p>給与履歴</p>
        </div>
        <div class="shadow">
            <div class="w-full" v-for="item in YearAllSalary" @click="sendItem(item.id)">
                <div class="text-lg text-center bg-blue-500 text-white inline-block w-full">
                    <p>{{ item.date }}</p>
                </div>
                <div class="bg-white p-3 text-left hover:bg-gray-200">
                    <div class="sm:grid grid-cols-6 items-center">
                        <p class="col-span-4 sm:pr-2 pr-0">{{ item.workplace }}</p>
                        <p class="flex-1 sm:pr-2 pr-0 text-sm sm:text-base sm:py-0 py-1">{{ item.bank }}</p>
                        <p>{{ item.money }}円</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="p-3 text-center bg-white shadow" v-show="nullDataShow">データがありません</p>
        <modal :itemResData="itemResData" :dialog="dialog" @toggleModal="toggleModal" @showAlert="showAlert" />
    </div>
</template>

<style>
/* アラート用CSS */
#alert {
    position: fixed;
    bottom: 20px;
    right: 20px;
}
</style>

<script>
import modal from './modal.vue'
import API from '../const';

export default {
    data() {
        return {
            YearAllSalary: [], //年内全ての給与
            nullDataShow: false, //データ件数が0件の場合true
            itemResData: [], //レスポンスのデータ
            dialog: false, //ダイアログの開閉
            alertMessage: '', //アラートメッセージ
            alertType: 'success',
            showAlertFlg: false, //アラートを表示するかどうか
        }
    },
    methods: {
        initListData: function () {
            axios.post(API.API_URL.getYearAllSalary).then((response) => {
                const res = response.data; //レスポンスデータ

                //変数へ格納
                this.YearAllSalary = res;

                //データ件数が0件か確認
                if (this.YearAllSalary.length === 0) {
                    this.nullDataShow = true;
                }
            });
        },
        //個別のデータを取得
        sendItem: function (num) {
            axios.post(API.API_URL.getSalary, { id: num }).then((response) => {
                const res = response.data; //レスポンスデータ
                //変数へ格納
                this.itemResData = res;
                this.dialog = true
            });
        },

        //modal を削除する（modalからemitで実行）
        toggleModal: function (status) {
            this.dialog = status;
        },

        //アラートを表示
        showAlert: function (resdate) {
            //リストの初期化
            if (resdate.status) {
                this.initListData();
            }
            this.$emit('showAlert', resdate); //親コンポーネントのメーセージ表示
        },

    },
    mounted() {
        //ページの初期化
        this.initListData();
    },

    props: ['showing'],
    components: {
        modal,
    },
}
</script>
