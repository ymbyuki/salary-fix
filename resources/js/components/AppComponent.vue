<!--
Component Content：ルートVue
parent-component：app.js(app.blade.php)
child-component：NULL
-->

<template>
    <v-app>
        <v-app-bar app prop>
            <v-app-bar-nav-icon class="d-flex d-sm-none"></v-app-bar-nav-icon>
            <v-toolbar-title>
                <router-link to="/home">Salary</router-link>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <li>
                <router-link to="/home">Home</router-link>
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
                    <v-list-item>
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

        <v-footer app>
            <!-- -->
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