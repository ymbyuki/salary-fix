<!--
Component Content：ルートVue
parent-component：app.js(app.blade.php)
child-component：NULL
-->

<template>
    <v-app>
        <v-app-bar app prop class="list-none">
            <v-app-bar-nav-icon class="d-flex d-sm-none"></v-app-bar-nav-icon>
            <v-toolbar-title>
                <router-link to="/home">
                    <img class="block h-9 w-auto" src="../../../public/img/logo.svg" alt="">
                </router-link>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <li>
                <router-link to="/home" class="mr-4">Home</router-link>
            </li>
            <li>
                <router-link to="/new">新規登録</router-link>
            </li>

            <v-menu bottom left offset-y>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn icon v-bind="attrs" v-on="on">
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item link>
                        <v-list-item-title @click="logout()">ログアウト</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>



        </v-app-bar>
        <v-main>
            <v-container fluid grey lighten-2>
                <router-view class="pb-8 sm:px-16 px-8 min-h-screen"></router-view>
            </v-container>
        </v-main>

        <v-footer color="primary lighten-1" padless>
            <v-row justify="center" no-gutters>
                <v-col class="primary lighten-2 py-4 text-center white--text" cols="12">
                    {{ new Date().getFullYear() }} — <strong>Salary produced by MuTech.</strong>
                </v-col>
            </v-row>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    methods: {
        logout: function () {
            document.getElementById('logout-form').submit();
        }
    }
}
</script>