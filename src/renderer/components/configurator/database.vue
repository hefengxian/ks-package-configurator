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
                    数据库配置
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
                                <a-form-item v-for="(item, key) in configForm.items"
                                             :key="key"
                                             :labelCol="{ span: 5 }"
                                             :wrapperCol="{ span: 12 }">
                                    <!-- 表单标题 -->
                                    <span slot="label">{{item.label}}
                                        <a-tooltip v-if="item.helpText && item.helpText !== ''"
                                                   :title="item.helpText">
                                            <a-icon type='question-circle-o' />
                                        </a-tooltip>
                                    </span>

                                    <!-- 表单为路径的时候 -->
                                    <a-input-search v-if="item.type === 'path'"
                                                    v-model.trim="item.value">
                                        <a-button icon="folder-open"
                                                  title="打开目录"
                                                  slot="enterButton"></a-button>
                                    </a-input-search>

                                    <!-- 表达类型为数字的时候 -->
                                    <a-input-number v-else="item.type === 'number'"
                                                    v-model="item.value" />

                                    <!-- 其他类型，默认为字符串，普通表单 -->
                                    <a-input v-else
                                             v-model.trim="item.value" />
                                </a-form-item>

                                <!-- 是否拷贝目录 -->
                                <a-form-item :labelCol="{ span: 5 }"
                                             :wrapperCol="{ span: 12 }">
                                    <span slot="label">拷贝目录
                                        <a-tooltip>
                                            <span slot="title">是否将原 Data 目录下的文件复制到新的 Data 目录</span>
                                            <a-icon type='question-circle-o' />
                                        </a-tooltip>
                                    </span>
                                    <a-switch>
                                        <a-icon type="check" slot="checkedChildren"/>
                                        <a-icon type="cross" slot="unCheckedChildren"/>
                                    </a-switch>
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
    import baseComponent from '../common/base-component'

    export default {
        name: "database-configurator",
        mixins: [baseComponent],
        data() {
            this.getFormConfig('ddd')
            return {
                currentTab: 'doc',
                configForm: {
                    title: '',
                    items: [
                        {
                            type: 'path',
                            label: '原 Data 目录',
                            name: 'oldPath',
                            value: 'D:\\KWM\\Database_Server\\Data',
                            placeholder: '',
                        },
                        {
                            type: 'path',
                            label: '新 Data 目录',
                            name: 'newPath',
                            value: 'E:\\Data',
                            placeholder: '',
                        },
                        {
                            type: 'number',
                            label: 'Innodb pool size',
                            name: 'poolSize',
                            value: 1,
                            placeholder: '',
                            helpText: '单位 GB，如果是单独的数据库服务器，应该配置为机器物理内存的 70% - 80%',
                        },
                    ],
                }
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