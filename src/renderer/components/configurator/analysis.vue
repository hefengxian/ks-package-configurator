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
                    分析服务器配置
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
                        <a-card title="数据库配置修改">
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
                                    <a-switch v-model="needCopy">
                                        <a-icon type="check" slot="checkedChildren"/>
                                        <a-icon type="cross" slot="unCheckedChildren"/>
                                    </a-switch>
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
                            <a-tabs :animated="false">
                                <a-tab-pane v-for="(template, key) in templates"
                                            :tab="template.name"
                                            :key="template.name">
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
        name: "analysis-configurator",
        mixins: [baseComponent],
        data() {
            return {
                needCopy: false,
                submitting: false,
            }
        },
        created() {
            this.init('database')
        },
        computed: {
            templates() {
                let templates = this.params.templates
                templates = templates.map(v => {
                    v = this.render(v)
                    v = this.highlightTemplate(v)
                    return v
                })
                return templates
            }
        },
        methods: {
            onSubmit() {
                this.submitting = true
                // 保存配置文件
                this.saveConfig()
                // 如果开启了拷贝文件
                if (this.needCopy) {
                    let modal = this.parseModel()
                    this.copy(modal['oldPath'], modal['newPath']).then(() => {
                        this.submitting = false
                    }).catch(e => {
                        this.submitting = false
                    })
                } else {
                    this.submitting = false
                }
            },
        },
    }
</script>

<style>

</style>