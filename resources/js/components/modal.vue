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
                    <v-card-text>
                        <v-text-field label="日付" :rules="rules" hide-details="auto" :value="itemResData.date"
                            :readonly="!update" type="date"></v-text-field>
                        <v-text-field label="会社名" :rules="rules" hide-details="auto" :value="itemResData.workplace"
                            :readonly="!update">
                        </v-text-field>
                        <v-text-field label="銀行名" :rules="rules" hide-details="auto" :value="itemResData.bank"
                            :readonly="!update">
                        </v-text-field>
                        <v-text-field label="金額" :rules="rules" hide-details="auto" :value="itemResData.money"
                            :readonly="!update">
                        </v-text-field>
                    </v-card-text>
                    <v-card-text>
                        <v-btn color="primary" @click="changeUpdate()" v-show="!update">更新</v-btn>
                        <v-btn color="error" @click="deleteContent = !deleteContent" v-show="!update">削除</v-btn>
                        <v-btn color="primary" @click="sendUpdate()" v-show="update">確定</v-btn>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn color="primary" text @click="hideModal()">閉じる</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>

            <v-dialog v-model="deleteContent" max-width="500px">
                <v-card>
                    <v-card-title>
                        <span>削除</span>
                    </v-card-title>
                    <v-card-actions>
                        <v-btn color="primary" text @click="deleteContent = false">閉じる</v-btn>
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
            deleteContent: false, //削除モーダルフラッグ
            title: '確認', //モーダルタイトル
            subTitle: '', //モーダルサブタイトル
            update: false, //更新フラグ
            rules: [
                value => !!value || 'Required.',
                value => (value && value.length >= 3) || 'Min 3 characters',
            ],
        }
    },
    props: ['itemResData', 'dialog'],
    methods: {
        //編集切り替え
        changeUpdate: function () {
            this.title = '編集';
            this.subTitle = '値を変更してください';
            this.update = true
        },

        //モーダル削除（親コンポーネントをemitで実行）
        hideModal: function () {
            this.$emit('toggleModal', false);
            setTimeout(() => {
                this.update = false
                this.title = '確認'
                this.subTitle = ''
            }, 100);
        },
        
        //アップデートを送信
        sendUpdate: function () {
            this.$emit('showAlert', 'データが送信されました');
            this.hideModal();
        },

    },

}
</script>