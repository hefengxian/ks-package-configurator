<template>
    <div>
        <div class="page-header">
            <a-breadcrumb>
                <a-breadcrumb-item>
                    <a-icon type="tool"/>
                    配置
                </a-breadcrumb-item>
                <a-breadcrumb-item>
                    <a-icon type="api"/>
                    Fetch 服务器配置
                </a-breadcrumb-item>
            </a-breadcrumb>
        </div>

        <div class="container">
            <a-tabs type="card"
                    :animated="{inkBar: false, tabPane: false}"
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
                <a-tab-pane key="config">
                    <div slot="tab">
                        <a-icon type="tool"/>
                        配置
                    </div>

                    <div class="config-form">
                        <a-card :title="params.title">
                            <!--<a href="#" slot="extra">more</a>-->
                            <a-form>
                                <a-form-item v-for="(item, key) in params.formItems"
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
                                                  @click.native="handleOpenFile(item.value, item)"
                                                  slot="enterButton"></a-button>
                                    </a-input-search>

                                    <!-- 表达类型为数字的时候 -->
                                    <a-input-number v-else-if="item.type === 'number'"
                                                    v-model="item.value" />

                                    <!-- 其他类型，默认为字符串，普通表单 -->
                                    <a-input v-else
                                             v-model.trim="item.value" />
                                </a-form-item>

                                <a-form-item class="form-submit"
                                             :wrapperCol="{ span: 12, offset: 5 }">
                                    <a-button type="primary"
                                              :loading="submitting"
                                              @click="onSubmit">保存</a-button>
                                </a-form-item>
                            </a-form>
                        </a-card>

                        <!-- 预览 -->
                        <a-card style="margin-top: 16px;">
                            <span slot="title">预览</span>
                            <a-tabs :animated="false" size="small">
                                <a-tab-pane v-for="(template, key) in templates"
                                            :key="template.name">
                                    <span slot="tab">{{template.name}}
                                        <a-tooltip :title="template.desc"><a-icon type='question-circle-o' /></a-tooltip>
                                    </span>
                                    <pre style="white-space: pre-wrap" v-html="template.contentHighlight"></pre>
                                </a-tab-pane>
                            </a-tabs>
                        </a-card>
                    </div>
                </a-tab-pane>
            </a-tabs>
        </div>
    </div>
</template>

<script>
    import baseComponent from '../common/base-component'

    export default {
        name: "fetch-configurator",
        mixins: [baseComponent],
        data() {
            return {
                needCopy: false,
                submitting: false,
            }
        },
        created() {
            this.init('fetch')
        },
        methods: {
            onSubmit() {
                this.submitting = true
                // 保存配置文件
                this.saveConfig()
                this.submitting = false
            },
        },
    }
</script>

<style>

</style>