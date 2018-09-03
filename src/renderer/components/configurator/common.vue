<template>
    <div>
        <div style="padding: 16px 0;">
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
                    @change="onTabChange"
                    defaultActiveKey="doc">
                <a-tab-pane key="doc">
                    <div slot="tab">
                        <a-icon type="file-text"/>
                        文档
                    </div>
                    <div ref="doc"></div>
                </a-tab-pane>
                <a-tab-pane key="config">
                    <div slot="tab">
                        <a-icon type="tool"/>
                        配置
                    </div>

                    <div class="config-form">
                        <a-card title="数据库配置修改">
                            <!--<a href="#" slot="extra">more</a>-->
                            <a-form>
                                <a-form-item label="原 Data 目录"
                                             :labelCol="{ span: 5 }"
                                             :wrapperCol="{ span: 12 }">
                                    <a-input-search >
                                        <a-button icon="folder-open"
                                                  title="打开目录"
                                                  slot="enterButton"></a-button>
                                    </a-input-search>
                                </a-form-item>
                                <a-form-item label="新 Data 目录"
                                             :labelCol="{ span: 5 }"
                                             :wrapperCol="{ span: 12 }">
                                    <a-input-search>
                                        <a-button icon="folder-open"
                                                  title="打开目录"
                                                  slot="enterButton"></a-button>
                                    </a-input-search>
                                </a-form-item>
                                <a-form-item label="Innodb pool size"
                                             :labelCol="{ span: 5 }"
                                             :wrapperCol="{ span: 12 }">
                                    <a-input-number :min="1"/>
                                    GB
                                </a-form-item>
                                <a-form-item class="form-submit"
                                             :wrapperCol="{ span: 12, offset: 5 }">
                                    <a-button>预览</a-button>
                                    <a-button type="primary">提交</a-button>
                                </a-form-item>
                            </a-form>
                        </a-card>
                    </div>
                </a-tab-pane>
            </a-tabs>
        </div>
    </div>
</template>

<script>
    import {remote, shell} from 'electron'

    export default {
        name: "common-configurator",
        data() {
            return {
                currentTab: 'doc',


                configForms: [
                    {
                        title: '',

                    }
                ],
            }
        },
        methods: {
            handleOpenFile(defaultPath, model) {
                let path = remote.dialog.showOpenDialog({
                    defaultPath,
                    properties: ['openDirectory']
                })
                model = path[0]
            },

            onTabChange(key) {
                console.log(key)
                this.currentTab = key
            },
        },
    }
</script>

<style>

</style>