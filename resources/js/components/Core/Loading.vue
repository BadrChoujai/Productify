<template>
    <div id="wrapper" class="flex justify-center items-center">
        <div class="profile-main-loader flex justify-center items-center">
            <div class="loader">
                <svg class="circular-loader" viewBox="25 25 50 50">
                    <circle
                        class="loader-path"
                        cx="50"
                        cy="50"
                        r="20"
                        fill="none"
                        stroke="#000"
                        stroke-width="2"
                    />
                </svg>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Loading",
};
</script>
<style lang="scss" scoped>
#wrapper {
    position: relative;
    height: 100%;
    width: 100%;
}

.profile-main-loader {
    position: fixed !important;
    top: 50% !important;
    width: 45px;
    z-index: 9000 !important;
}

.profile-main-loader .loader {
    position: relative;
    margin: 0px auto;
    width: 60px;
    height: 60px;
}
.profile-main-loader .loader:before {
    content: "";
    display: block;
    padding-top: 100%;
}

.circular-loader {
    -webkit-animation: rotate 2s linear infinite;
    animation: rotate 2s linear infinite;
    height: 100%;
    -webkit-transform-origin: center center;
    -ms-transform-origin: center center;
    transform-origin: center center;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    margin: auto;
}

.loader-path {
    stroke-dasharray: 150, 200;
    stroke-dashoffset: -10;
    -webkit-animation: dash 1.5s ease-in-out infinite,
        color 6s ease-in-out infinite;
    animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
    stroke-linecap: round;
}

@-webkit-keyframes rotate {
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

@keyframes rotate {
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@-webkit-keyframes dash {
    0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 89, 200;
        stroke-dashoffset: -35;
    }
    100% {
        stroke-dasharray: 89, 200;
        stroke-dashoffset: -124;
    }
}
@keyframes dash {
    0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 89, 200;
        stroke-dashoffset: -35;
    }
    100% {
        stroke-dasharray: 89, 200;
        stroke-dashoffset: -124;
    }
}
@-webkit-keyframes color {
    0% {
        stroke: #000;
    }
    40% {
        stroke: #000;
    }
    66% {
        stroke: #000;
    }
    80%,
    90% {
        stroke: #000;
    }
}
@keyframes color {
    0% {
        stroke: #383838;
    }
    40% {
        stroke: #242424;
    }
    66% {
        stroke: rgb(36, 36, 36);
    }
    80%,
    90% {
        stroke: rgb(37, 37, 37);
    }
}
</style>
