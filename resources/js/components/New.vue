<!--
Component Content：新規作成
parent-component：none
child-component：none
-->
<template>
    <div class="pt-5">
        <v-row justify="center">
            <v-card>
                <v-card-title>新規登録</v-card-title>
                <v-form ref="newForm">
                    <v-card-text>
                        <v-text-field v-model="date" label="日付" hide-details="auto" type="date"
                            :rules="rules.required"></v-text-field>

                        <v-row class="align-center my-1">
                            <v-col cols="12" md="8">
                                <v-text-field v-model="workplace" label="会社名" hide-details="auto"
                                    :rules="rules.required"></v-text-field>
                            </v-col>
                            <v-col cols="12" md="4">
                                <v-row justify="space-around">
                                    <v-menu offset-y>
                                        <template v-slot:activator="{ attrs, on }">
                                            <v-btn class="" outlined color="indigo" v-bind="attrs" v-on="on"
                                                @click="showworkplaceList()">
                                                登録済み職場
                                            </v-btn>
                                        </template>

                                        <v-list>
                                            <v-list-item v-for="item in workplaceList" :key="item.workplace" link
                                                @click="selectWorkplace(item.workplace)">
                                                <v-list-item-title v-text="item.workplace"></v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="align-center my-1">
                            <v-col cols="12" md="8">
                                <v-text-field v-model="bank" label="銀行名" hide-details="auto"
                                    :rules="rules.required"></v-text-field>
                            </v-col>
                            <v-col cols="12" md="4">
                                <v-row justify="space-around">
                                    <v-menu offset-y>
                                        <template v-slot:activator="{ attrs, on }">
                                            <v-btn class="" outlined color="indigo" v-bind="attrs" v-on="on"
                                                @click="showBankList()">
                                                登録済み銀行
                                            </v-btn>
                                        </template>

                                        <v-list>
                                            <v-list-item v-for="item in bankList" :key="item.bank" link
                                                @click="selectBank(item.bank)">
                                                <v-list-item-title v-text="item.bank"></v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                </v-row>
                            </v-col>
                        </v-row>
                        <v-text-field v-model="money" label="金額" hide-details="auto" suffix="円"
                            :rules="rules.numberVal"></v-text-field>
                    </v-card-text>
                    <v-card-text class="d-flex justify-end">
                        <v-btn class="mr-2" color="primary" @click="insertData()">登録</v-btn>
                    </v-card-text>
                </v-form>
            </v-card>
        </v-row>
    </div>

</template>

<script>
import API from '../const';

export default {
    data() {
        return {
            date: '', //日付
            bank: '', //銀行名
            workplace: '', //社名
            money: '', //金額
            bankList: [], //銀行のリスト
            workplaceList: [], //職場のリスト
            rules: {
                required: [
                    v => !!v || '必須項目です',
                ],
                numberVal: [
                    v => !!v || '必須項目です',
                    v => !!/^[0-9]+$/.test(v) || '半角数字で入力してください',
                ]
            },
        }
    },
    methods: {
        // データを送信
        insertData: function () {
            let validationFlag = this.$refs.newForm.validate();
            if (validationFlag) {
                // データを作成
                const sendData = {
                    bank: this.bank,
                    workplace: this.workplace,
                    date: this.date,
                    money: this.money,
                }
                // データを送信
                axios.post(API.API_URL.store, sendData).then((response) => {
                    const res = response.data; //レスポンスデータ
                    if (res.status === 'true') {
                        return ({
                            status: true,
                            message: "データが送信されました"
                        });
                    } else {
                        return ({
                            status: false,
                            message: "データが送信できませんでした"
                        });
                    }
                }).then((result) => {
                    // ホームに戻る
                    this.$router.push({ name: 'home', params: { message: result } });
                });
            }

        },
        // 銀行のリスト作成
        showBankList: function () {
            axios.post("/api/selectBankList").then((response) => {
                const res = response.data; //レスポンスデータ
                this.bankList = res;
            })
        },

        // 銀行を設定
        selectBank: function (bankName) {
            this.bank = bankName;
        },

        // 銀行のリスト作成
        showworkplaceList: function () {
            axios.post("/api/selectWorkplacekList").then((response) => {
                const res = response.data; //レスポンスデータ
                this.workplaceList = res;
            })
        },

        // 銀行を設定
        selectWorkplace: function (workplaceName) {
            this.workplace = workplaceName;
        }
    },

    mounted: function () {
        // 今日の日付をdataに設定
        var today = new Date();
        today.setDate(today.getDate());
        var yyyy = today.getFullYear();
        var mm = ("0" + (today.getMonth() + 1)).slice(-2);
        var dd = ("0" + today.getDate()).slice(-2);
        let todayData = yyyy + '-' + mm + '-' + dd;
        this.date = todayData;
    }
}
</script>