/**
 * Copyright © 2017-present, Knowlesys, Inc.
 * All rights reserved.
 *
 * 配置文件
 *
 * @author: HFX 2017-03-27 09-52
 * @version 1.0
 */

// server端入口地址，例如（注意用 `/` 结尾）： http://192.168.1.45/php/kwmcenter-server/
window.SERVER_ROOT_URL = '/kwmcloud/server/'

// API 地址前缀
window.BASE_URL = window.SERVER_ROOT_URL + 'api'

// OAuth password grant 相关
window.GRANT_TYPE = 'password'
window.CLIENT_ID = 'myawesomeapp'
window.CLIENT_SECRET = 'abc123'


// kwm2017 客户端根地址
window.KWM_WEB_CLIENT_ROOT_URL = '/kwm/#/'

// kwm2017 服务器根地址
window.KWM_WEB_SERVER_ROOT_URL = '/kwm/server/'

// 是否需要菜单图标
window.NEED_MENU_ICON = false
