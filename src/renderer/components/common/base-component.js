/**
 * Copyright © 2018-present, Knowlesys Ltd.
 * All rights reserved.
 *
 * @author: HFX 2018-09-05 15-22
 * @version 1.0
 */

import {remote, shell} from 'electron'
import fs from 'fs'
import path from 'path'
import MarkdownIt from 'markdown-it'

export default {
    data() {
        return {

        }
    },
    methods: {
        getFormConfig(relativePath) {
            let file = path.join(__static, 'template', 'config', relativePath)
            let content = this.readFile(file, `读取配置 ${file} 失败！`)
            if (content && JSON.parse(content)) {
                return JSON.parse(content)
            }
            return false;
        },
        getDoc(relativePath) {
            let md = new MarkdownIt()
            let file = path.join(__static, 'doc', relativePath)
            let content = fs.readFileSync(file)
            return md.render(content)
        },
        parseModel() {

        },
        readFile(file, errorMsg = false) {
            try {
                return fs.readFileSync(file)
            } catch (err) {
                this.$message.error(errorMsg ? errorMsg : `读取文件 ${file} 失败！`);
                return false
            }
        }
    }
}