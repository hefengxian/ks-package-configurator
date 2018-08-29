<template>
    <div id="app">
        <layout>
            <router-view></router-view>
        </layout>
    </div>
</template>

<script>
    import layout from './components/common/layout'

    export default {
        name: 'ks-package-configurator',
        components: {
            layout,
        }
    }
</script>

<style>
    /* CSS */
</style>
