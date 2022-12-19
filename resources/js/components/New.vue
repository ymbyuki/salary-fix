<template>
    <div class="pt-5">
        <v-row justify="center">
            <v-card>
                <v-card-title>新規登録</v-card-title>
                <v-form>
                    <v-card-text>
                        <v-text-field v-model="date" label="日付" hide-details="auto" type="date"></v-text-field>
                        <v-text-field v-model="workplace" label="会社名" hide-details="auto"></v-text-field>
                        <v-row class="align-center my-1">
                            <v-col cols="12" md="8">
                                <v-text-field v-model="bank" label="銀行名" hide-details="auto"></v-text-field>
                            </v-col>
                            <v-col cols="12" md="4" >
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
                        <v-text-field v-model="money" label="金額" hide-details="auto" suffix="円"></v-text-field>
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
export default {
    data() {
        return {
            date: '',
            bank: '',
            workplace: '',
            money: '',
            bankList: [],
        }
    },
    methods: {
        insertData: function () {
            const sendData = {
                bank: this.bank,
                workplace: this.workplace,
                date: this.date,
                money: this.money,
            }

            axios.post("/api/store", sendData).then((response) => {
                const res = response.data; //レスポンスデータ
                console.log(response.data)
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
                this.$router.push({ name: 'home', params: { message: result } });
            });

        },
        showBankList: function () {
            axios.post("/api/selectBankList").then((response) => {
                const res = response.data; //レスポンスデータ
                this.bankList = res;
            })
        },
        selectBank: function (bankName) {
            this.bank = bankName;
        }
    },
    mounted: function () {
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