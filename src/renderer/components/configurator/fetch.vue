<template>
    <div>
        <div style="padding: 16px 0;">
            <a-breadcrumb>
                <a-breadcrumb-item><a-icon type="tool" /> 配置</a-breadcrumb-item>
                <a-breadcrumb-item><a-icon type="medicine-box" /> 获取服务器配置</a-breadcrumb-item>
            </a-breadcrumb>
        </div>

        <div class="container">
            <a-tabs type="card"
                    @change="onTabChange"
                    defaultActiveKey="doc">
                <a-tab-pane key="doc">
                    <div slot="tab">
                        <a-icon type="file-text"/>
                        文档
                    </div>
                    <p>Content of Tab Pane 1</p>
                    <p>Content of Tab Pane 1</p>
                    <p>Content of Tab Pane 1</p>
                </a-tab-pane>
                <a-tab-pane key="config">
                    <div slot="tab">
                        <a-icon type="tool"/>
                        配置
                    </div>

                    <p>Content of Tab Pane 2</p>
                    <p>Content of Tab Pane 2</p>
                    <p>Content of Tab Pane 2</p>
                </a-tab-pane>
            </a-tabs>
        </div>
    </div>

    <!--<div>
        <a-card style="width:100%"
                :tabList="tabList"
                :defaultActiveTabKey="currentTab"
                @tabChange="onTabChange">
            <div slot="doc" slot-scope="item">
                <a-icon :type="item.icon"/>{{item.label}}
            </div>
            <div slot="config" slot-scope="item">
                <a-icon :type="item.icon"/>{{item.label}}
            </div>

            <div v-if="currentTab === 'doc'">
                doc
            </div>
            <div v-if="currentTab === 'config'">
                Config
            </div>
        </a-card>
    </div>-->
</template>

<script>
    export default {
        name: "fetch-configurator",
        data() {
            return {
                currentTab: 'doc',
                tabList: [
                    {
                        key: 'doc',
                        label: '文档',
                        icon: 'file-text',
                        scopedSlots: {tab: 'doc'}
                    },
                    {
                        key: 'config',
                        label: '配置',
                        icon: 'tool',
                        scopedSlots: {tab: 'config'}
                    },
                ],

            }
        },
        methods: {
            onTabChange(key) {
                console.log(key)
                this.currentTab = key
            },
        },
    }
</script>

<style>

</style>