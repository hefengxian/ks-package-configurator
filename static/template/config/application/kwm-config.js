/**
 * Copyright © 2017-present, Knowlesys, Inc.
 * All rights reserved.
 *
 * 配置文件
 *
 * @author: HFX 2017-03-27 09-52
 * @version 1.0
 */

// ！！！！server 端入口地址，修改个人测试地址之后请勿提交到 CVS！！！！
// 输入的地址轻请以 ‘/’ 结尾，例如开发测试地址：http://192.168.1.45/php/kwm-next-server/
window.SERVER_ROOT_URL = '/kwm/server/'

// API 地址前缀
window.BASE_URL = SERVER_ROOT_URL + 'api'


// OAuth password grant 相关
window.GRANT_TYPE = 'password'
window.CLIENT_ID = 'myawesomeapp'
window.CLIENT_SECRET = 'abc123'

// localStorage 存储相关
window.OAUTH_STORAGE_KEY = '0021c807b1a57472bd8f9d885c568d65'


// 重新分类主题的接口地址  例：/subject-classifier/app/agent/subject_classify_agent.php
window.SUBJECT_REDO_CLASSIFY_URL = '{{{reclassifyUrl}}}/app/agent/subject_classify_agent.php'

// 运营中心地址
window.KWM_CENTER_URL = '/kwmcloud/'
// 判断是否为乐思公司（部分高级运维功能只能我们可以维护）
window.IS_KNOWLESYS = true

// 首页是否显示主题的疑似正面及确认正面的 统计数量
window.IS_SHOW_SUBJECT_POSITIVE_STAT_DATA = 0

// 默认主题
window.DEFAULT_THEME = 'blue'

// 系统默认的网站头标题，登录界面的主标题，副标题
window.DEFAULT_HEADER_TITLE = '乐思网络舆情监测系统'
window.DEFAULT_LOGIN_MAIN_TITLE = '乐思网络舆情监控系统'
window.DEFAULT_LOGIN_SUB_TITLE = 'Knowlesys Web Monitor'

// 前台首页文章舆情地域的地图类型，china => 中国，world => 世界 （购买了我们产品的客户有需求时才修改为世界地图，此外还需修改相关采集配置）
window.FRONT_ARTICLE_MENTION_AREA_MAP_TYPE = 'china';
