
<template>
    <div class="text-center">
        <v-app>
            <v-btn depressed elevation="2" large outlined @click="test()">TEST</v-btn>
            <v-alert type="success"></v-alert>
        </v-app>
    </div>
</template>

<script>
export default {
    data() {
        return {
        }
    },
    methods: {
        test() {
            console.log("OKOK");
        }
    },
}
</script>