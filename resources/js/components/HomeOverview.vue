<template>
    <div>
        <template>
            <div>

                <h2 class="text-2xl pt-24">年度給与計算</h2>

                <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-2 mt-8">

                    <div class="flex items-center py-6 px-3 bg-white border-l-8 border-red-200 rounded-lg shadow-md">
                        <h2><i class="ri-calendar-2-line text-4xl text-red-400"></i></h2>
                        <div class="pl-6">
                            <p class="text-xl">円</p>
                            <p class="pt-2">今月の給与</p>
                        </div>
                    </div>

                    <div class="flex items-center py-6 px-3 bg-white border-l-8 border-blue-200 rounded-lg shadow-md">
                        <h2><i class="ri-calendar-fill text-4xl text-blue-400"></i></h2>
                        <div class="pl-6">
                            <p class="text-xl">円</p>
                            <p class="pt-2">今年度の給与</p>
                        </div>
                    </div>

                    <div
                        class="flex items-center py-6 px-3 bg-red-400 text-white border-l-8 border-green-200 rounded-lg shadow-md">
                        <h2><i class="ri-lock-line text-4xl text-green-400"></i></h2>
                        <div class="pl-6">
                            <p class="text-xl">0円</p>
                            <p class="pt-2">103万まで</p>
                        </div>
                    </div>

                    <!-- <div class="flex items-center py-6 px-3 bg-white border-l-8 border-green-200 rounded-lg shadow-md">
                        <h2><i class="ri-lock-unlock-line text-4xl text-green-400"></i></h2>
                        <div class="pl-6">
                            <p class="text-xl">円</p>
                            <p class="pt-2">103万まで</p>
                        </div>
                    </div> -->

                    <div
                        class="flex items-center py-6 px-3 bg-red-400 text-white border-l-8 border-yellow-200 rounded-lg shadow-md">
                        <h2><i class="ri-lock-fill text-4xl text-yellow-400"></i></h2>
                        <div class="pl-6">
                            <p class="text-xl">0円</p>
                            <p class="pt-2">130万まで</p>
                        </div>
                    </div>
                    <!-- <div class="flex items-center py-6 px-3 bg-white border-l-8 border-yellow-200 rounded-lg shadow-md">
                        <h2><i class="ri-lock-unlock-fill text-4xl text-yellow-400"></i></h2>
                        <div class="pl-6">
                            <p class="text-xl">円</p>
                            <p class="pt-2">130万まで</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </template>
    </div>
</template>