<template>
    <!-- App.vue -->

    <v-app>
        <header>
            <h1>HELLO</h1>
        </header>

        <!-- アプリケーションのコンポーネントに基づいてコンテンツのサイズを決定 -->
        <v-main>
            <!-- アプリケーションに適切なgutterを提供 -->
            <v-container fluid>
                <!-- vue-routerを使用する場合 -->
                <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app>
            <!-- -->
        </v-footer>
    </v-app>
</template>

  