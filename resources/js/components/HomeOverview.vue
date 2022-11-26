<template>
    <div>
        <div>
            <h2 class="text-2xl pt-24">年度給与計算</h2>
            <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-2 mt-8">

                <div class="flex items-center py-6 px-3 bg-white border-l-8 border-red-200 rounded-lg shadow-md">
                    <h2><i class="ri-calendar-2-line text-4xl text-red-400"></i></h2>
                    <div class="pl-6">
                        <p class="text-xl">{{ totalThisMonthCost }}円</p>
                        <p class="pt-2">今月の給与</p>
                    </div>
                </div>

                <div class="flex items-center py-6 px-3 bg-white border-l-8 border-blue-200 rounded-lg shadow-md">
                    <h2><i class="ri-calendar-fill text-4xl text-blue-400"></i></h2>
                    <div class="pl-6">
                        <p class="text-xl">{{ totalCost }}円</p>
                        <p class="pt-2">今年度の給与</p>
                    </div>
                </div>

                <div
                    class="flex items-center py-6 px-3 border-l-8 border-green-200 rounded-lg shadow-md" :class="{'bg-red-400' : rock103, 'text-white': rock103}">
                    <h2><i class="ri-lock-line text-4xl text-green-400"></i></h2>
                    <div class="pl-6">
                        <p class="text-xl">{{ rest103 }}円</p>
                        <p class="pt-2">103万まで</p>
                    </div>
                </div>

                <div
                    class="flex items-center py-6 px-3 border-l-8 border-yellow-200 rounded-lg shadow-md"  :class="{'bg-red-400' : rock130, 'text-white': rock130}">
                    <h2><i class="ri-lock-fill text-4xl text-yellow-400"></i></h2>
                    <div class="pl-6">
                        <p class="text-xl">{{ rest130 }}円</p>
                        <p class="pt-2">130万まで</p>
                    </div>
                </div>
            </div>
        </div>

        {{ YearAllSalary }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            totalCost: '',
            totalThisMonthCost: '',
            YearAllSalary: [],
            rock103: false,
            rest103: 0,
            rock130: false,
            rest130: 0,
        }
    },
    mounted() {
        axios.get("/api/initIndexPage").then((response) => {
            const res = response.data;
            this.totalCost = res.totalCost;
            this.totalThisMonthCost = res.totalThisMonthCost;
            this.YearAllSalary = res.YearAllSalary;
            this.rest103 = 1030000 - this.totalCost;
            this.rest130 = 1300000 - this.totalCost;
            if ( this.rest103 <= 0) {
                this.rock103 = true;
                this.rest103 = 0;
            };
            if ( this.rest130 <= 0) {
                this.rock130 = true;
                this.rest130 = 0;
            };
        });

    }
}
</script>