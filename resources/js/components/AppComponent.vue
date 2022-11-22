<template>
    <v-app>
        <header>
            <v-app-bar app prop>
                <v-app-bar-nav-icon class="d-flex d-sm-none"></v-app-bar-nav-icon>
                <v-toolbar-title>Salary</v-toolbar-title>
                <v-spacer></v-spacer>
                <li><router-link to="/home">Home</router-link></li>
                <li><router-link to="/test">test</router-link></li>

                <v-btn icon>
                    <v-icon>mdi-briefcase-plus</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </v-app-bar>
        </header>
        <!-- アプリケーションのコンポーネントに基づいてコンテンツのサイズを決定 -->
        <v-main>
            <!-- アプリケーションに適切なgutterを提供 -->
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app>
            <!-- -->
        </v-footer>
    </v-app>
</template>

  