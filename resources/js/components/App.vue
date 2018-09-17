<template>
    <div class="container">
        <AppNav></AppNav>
        <flash-message></flash-message>
        <router-view class="view"></router-view>
    </div>
</template>
<script>
    import AppNav from './AppNav'

    export default {
        components: {
            AppNav
        },
    }
</script>