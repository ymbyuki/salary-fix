<template>
    <transition name="fade">
        <div id="loading" v-show="showing">
            <v-progress-circular :size="70" :width="7" color="blue" indeterminate></v-progress-circular>
        </div>
    </transition>
</template>

<style>
#loading {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    left: 0;
    top: 0;
    background-color: rgba(193, 193, 193, 1);
    z-index: 1000;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity .3s;
}

.fade-enter,
.fade-leave-to
    {
    opacity: 0;
}
</style>

<script>
export default {
    props: ['showing']
}
</script>