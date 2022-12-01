<!--
Component Content：ホーム概要
parent-component：Home
child-component：loading
-->
<template >
    <div>
        <loading :showing="showing"></loading> <!--ローディング画面-->

        <h2 class="text-2xl mt-5">{{ nendo }}年給与計算</h2>
        <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-2 mt-8">

            <!-- 今月の給与 -->
            <div class="flex items-center py-6 px-3 bg-white border-l-8 border-red-200 rounded-lg shadow-md">
                <h2><i class="ri-calendar-2-line text-4xl text-red-400"></i></h2>
                <div class="pl-6">
                    <p class="text-xl mb-0">{{ totalThisMonthCost }}円</p>
                    <p class="pt-2 mb-0">今月の給与</p>
                </div>
            </div>
            <!-- /今月の給与 -->

            <!-- 今年度の給与 -->
            <div class="flex items-center py-6 px-3 bg-white border-l-8 border-blue-200 rounded-lg shadow-md">
                <h2><i class="ri-calendar-fill text-4xl text-blue-400"></i></h2>
                <div class="pl-6">
                    <p class="text-xl mb-0">{{ totalCost }}円</p>
                    <p class="pt-2 mb-0">今年度の給与</p>
                </div>
            </div>
            <!-- /今年度の給与 -->

            <!-- 103万まで -->
            <div class="flex items-center py-6 px-3 border-l-8 border-green-200 rounded-lg shadow-md"
                :class="{ 'bg-red-400': rock103, 'text-white': rock103, 'bg-white': !rock103 }">
                <h2><i class="text-4xl text-green-400"
                        :class="{ 'ri-lock-line': rock103, 'ri-lock-unlock-fill': !rock103 }"></i></h2>
                <div class="pl-6">
                    <p class="text-xl mb-0">{{ rest103 }}円</p>
                    <p class="pt-2 mb-0">103万まで</p>
                </div>
            </div>
            <!-- /103万まで -->

            <!-- 130万まで -->
            <div class="flex items-center py-6 px-3 border-l-8 border-yellow-200 rounded-lg shadow-md"
                :class="{ 'bg-red-400': rock130, 'text-white': rock130, 'bg-white': !rock130 }">
                <h2><i class="text-4xl text-yellow-400"
                        :class="{ 'ri-lock-line': rock130, 'ri-lock-unlock-fill': !rock130 }"></i></h2>
                <div class="pl-6">
                    <p class="text-xl mb-0">{{ rest130 }}円</p>
                    <p class="pt-2 mb-0">130万まで</p>
                </div>
            </div>
            <!-- /130万まで -->

        </div>
    </div>

</template>

<script>
import loading from './loading.vue';

export default {
    data() {
        return {
            totalCost: '', //合計値
            totalThisMonthCost: '', //月の合計値
            rock103: false, //103万のロック情報
            rest103: 0, //103万までのリミット
            rock130: false, //103万のロック情報
            rest130: 0, //120万までのリミット
            nendo: '',
            showing: true, //ローディング画面,
        }
    },
    components: {
        loading,
    },
    methods: {
        //ページの初期化
        initPage: function () {

            // initIndexPageの呼び出し
            axios.post("/api/initIndexPage").then((response) => {
                const res = response.data; //レスポンスデータ

                //変数へ格納
                this.totalCost = res.totalCost;
                this.totalThisMonthCost = res.totalThisMonthCost;
                this.rest103 = 1030000 - this.totalCost;
                this.rest130 = 1300000 - this.totalCost;

                //年度の作成
                const nowDate = new Date();
                this.nendo = nowDate.getFullYear();

                //103 or 130万を超えていないか確認
                if (this.rest103 <= 0) {
                    this.rock103 = true;
                    this.rest103 = 0;
                };
                if (this.rest130 <= 0) {
                    this.rock130 = true;
                    this.rest130 = 0;
                };

                //ローディング画面を削除
                this.showing = false;
            });
        }
    },
    created() {
        this.initPage()
    },

}
</script>