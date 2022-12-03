<!--
Component Content：モーダル用
parent-component：
child-component：
-->

<template>
    <div>
        <v-row justify="center">
            <v-dialog v-model="dialog" max-width="500px" @click:outside="hideModal">
                <v-card>
                    <v-card-title>{{ title }}</v-card-title>
                    <v-card-subtitle>{{ subTitle }}</v-card-subtitle>
                    <v-form>
                        <v-card-text>
                            <v-text-field v-model="date" label="日付" :rules="rules" hide-details="auto"
                                :readonly="!update" type="date"></v-text-field>
                            <v-text-field v-model="workplace" label="会社名" :rules="rules" hide-details="auto"
                                :readonly="!update">
                            </v-text-field>
                            <v-text-field v-model="bank" label="銀行名" :rules="rules" hide-details="auto"
                                :readonly="!update">
                            </v-text-field>
                            <v-text-field v-model="money" label="金額" :rules="rules" hide-details="auto"
                                :readonly="!update" suffix="円">
                            </v-text-field>
                        </v-card-text>
                        <v-card-text class="d-flex justify-end">
                            <v-btn class="mr-2" color="primary" @click="changeUpdate()" v-show="!update">更新</v-btn>
                            <v-btn color="error" @click="deleteModal = !deleteModal" v-show="!update">削除</v-btn>
                            <v-btn color="primary" @click="sendUpdate()" v-show="update">確定</v-btn>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="primary" text @click="hideModal()">閉じる</v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-dialog>

            <v-dialog v-model="deleteModal" max-width="500px">
                <v-card>
                    <v-card-title>
                        <span>削除</span>
                    </v-card-title>
                    <v-card-text>
                        本当に削除しますか？
                    </v-card-text>

                    <v-card-actions class="d-flex justify-end">
                        <v-btn color="primary" @click="deleteModal = false">いいえ</v-btn>
                        <v-btn class="mr-2" color="error" @click="sendDelete">はい</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
    </div>

</template>

<script>
export default {
    data() {
        return {
            deleteModal: false, //削除モーダルフラッグ
            title: '確認', //モーダルタイトル
            subTitle: '', //モーダルサブタイトル
            update: false, //更新フラグ
            rules: [
                value => !!value || 'Required.',
                value => (value && value.length >= 3) || 'Min 3 characters',
            ],
            //リストからのデータ
            date: '',
            bank: '',
            workplace: '',
            money: '',
            id: 0,
        }
    },

    props: ['itemResData', 'dialog'],

    methods: {
        //編集切り替え
        changeUpdate: function () {
            this.title = '編集';
            this.subTitle = '値を変更してください';
            this.update = true;
        },

        //モーダル削除（親コンポーネントをemitで実行）
        hideModal: function () {
            this.$emit('toggleModal', false);
            setTimeout(() => {
                //ボタン等の項目を初期化
                this.update = false
                this.title = '確認'
                this.subTitle = ''
            }, 100);
        },

        //アップデートを送信
        sendUpdate: function () {
            const sendUpdateData = {
                bank: this.bank,
                workplace: this.workplace,
                date: this.date,
                money: this.money,
                id: this.id
            }

            axios.post("/api/update", sendUpdateData).then((response) => {
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
                this.$emit('showAlert', result); //メッセージの表示
                this.hideModal(); //モーダルの削除
            });

        },
        sendDelete: function () {
            const sendDelete = {
                id: this.id
            };
            axios.post("/api/delete", sendDelete).then((response) => {
                const res = response.data; //レスポンスデータ
                if (res.status === 'true') {
                    return ({
                        status: true,
                        message: "削除しました"
                    });
                } else {
                    return ({
                        status: false,
                        message: "削除することができませんでした"
                    });
                }
            }).then((result) => {
                this.$emit('showAlert', result); //メッセージの表示
                this.deleteModal = false; //モーダルの削除
                this.hideModal(); //モーダルの削除
            });
        }
    },

    watch: {
        dialog: function () {
            if (this.dialog) {
                const itemData = this.itemResData;

                //該当項目を変数に代入
                this.date = itemData.date;
                this.bank = itemData.bank;
                this.workplace = itemData.workplace;
                this.money = itemData.money;
                this.id = itemData.id;
            }
        }
    }



}
</script>