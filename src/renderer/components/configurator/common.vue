<template>
    <div>
        <div class="page-header">
            <a-breadcrumb>
                <a-breadcrumb-item>
                    <a-icon type="tool"/>
                    配置
                </a-breadcrumb-item>
                <a-breadcrumb-item>
                    <a-icon type="medicine-box"/>
                    通用配置
                </a-breadcrumb-item>
            </a-breadcrumb>
        </div>

        <div class="container">
            <a-tabs type="card"
                    defaultActiveKey="doc">
                <a-tab-pane key="doc">
                    <div slot="tab">
                        <a-icon type="file-text"/>
                        文档
                    </div>
                    <a-card>
                        <div ref="doc" class="markdown-body" v-html="doc"></div>
                    </a-card>
                </a-tab-pane>
            </a-tabs>
        </div>
    </div>
</template>

<script>
    import baseComponent from '../common/base-component'

    export default {
        name: "common-configurator",
        mixins: [baseComponent],

        data() {
            return {
                submitting: false,
            }
        },
        created() {
            this.init('common')
        },
        methods: {
        },
    }
</script>

<style>

</style>