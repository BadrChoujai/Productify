<template>
    <div class="h-screen w-screen">
        <div class="h-full flex justify-center items-center">
            <h1 class="text-pink-400 text-3xl font-bold">Just Got Born!</h1>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
};
</script>
<style>
body {
    font-family: "Montserrat", sans-serif;
}
</style>
