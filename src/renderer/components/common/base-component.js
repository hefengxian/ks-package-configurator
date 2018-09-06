/**
 * Copyright © 2018-present, Knowlesys Ltd.
 * All rights reserved.
 *
 * @author: HFX 2018-09-05 15-22
 * @version 1.0
 */

import {remote, shell} from 'electron'
import fs from 'fs'
import fse from 'fs-extra'
import path from 'path'
import MarkdownIt from 'markdown-it'
import yaml from 'js-yaml'
import Prism from 'prismjs'
import Mustache from 'mustache'

export default {
    data() {
        return {
            params: {
                title: '',
                formItems: [],
                templates: [],
            },
            doc: '',
            module: '',
        }
    },
    methods: {
        init(module) {
            this.module = module
            // 读取文件
            // 文档
            this.doc = this.getDoc('readme.md')
            // 配置
            let params = this.getConfig('params.yaml')
            // 模板
            params.templates = params.templates.map(v => {
                v['template'] = this.getConfigTemplate(v['templateFile'])
                return v
            })
            this.params = params
            // console.log(this.params)
        },
        handleOpenFile(defaultPath, model) {
            let path = remote.dialog.showOpenDialog({
                defaultPath,
                properties: ['openDirectory']
            })
            if (path && path.length === 1) {
                model.value = path[0]
            }
        },
        getConfig(filename) {
            let file = path.join(__static, 'template', 'form', this.module, filename)
            let content = this.readFile(file, `读取表单配置 ${file} 失败！`)
            if (content) {
                try {
                    return yaml.safeLoad(content)
                } catch (e) {
                    this.$message.error('解析表单配置失败！')
                }
            }
            return false
        },
        getConfigTemplate(filename) {
            let file = path.join(__static, 'template', 'config', this.module, filename)
            return this.readFile(file, `读取配置模板文件 ${file} 失败！`)
        },
        getDoc(filename) {
            let file = path.join(__static, 'doc', this.module, filename)
            let content = this.readFile(file, `读取文档 ${file} 失败！`)
            if (content) {
                let md = new MarkdownIt()
                return md.render(content.toString())
            }
            return ''
        },
        highlightTemplate(t) {
            try {
                let ext = t.templateFile.split('.')
                ext = ext[ext.length - 1]
                require(`prismjs/components/prism-${ext}`)
                t.contentHighlight = Prism.highlight(t.content, Prism.languages[ext], ext)
            } catch (e) {
                console.log(e)
            }
            return t
        },
        render(t) {
            t.content = Mustache.render(t.template, this.parseModel())
            return t
        },
        parseModel() {
            let model = {}
            this.params.formItems.forEach(v => {
                model[v.name] = v.value
            })
            return model
        },
        saveConfig() {
            this.params.templates.forEach(v => {
                fs.writeFile(v.dest, v.content, e => {
                    if (e) {
                        this.$message.error(e)
                    } else {
                        this.$message.success(`${v.name} 保存成功`)
                    }
                })
            })
        },
        copy(src, dest) {
            return fse.copy(src, dest).then(() => {
                this.$message.success(`成功拷贝 ${src} 到 ${dest}!`)
            }).catch(e => {
                this.$message.error(`拷贝失败！`)
                console.log(e)
            })
        },
        readFile(file, errorMsg = false) {
            try {
                return fs.readFileSync(file).toString()
            } catch (err) {
                this.$message.error(errorMsg ? errorMsg : `读取文件 ${file} 失败！`);
                console.log(err)
                return false
            }
        }
    }
}