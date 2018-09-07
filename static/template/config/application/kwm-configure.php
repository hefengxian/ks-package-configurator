<?php
/*
 * Copyright © 2016-present, Knowlesys, Inc.
 * All rights reserved.
 *
 * Configure.php
 *
 * @author: HFX 2016-12-22 14-25
 * @version 1.0
 */

namespace Knowlesys\Config;


/**
 * Class Configure 配置类
 *
 * @package Knowlesys\Config
 * @version 1.0
 */
class Configure
{
    /**
     * 是否为调试模式
     */
    const DEBUG = true;

    /**
     * 是否允许跨域请求
     */
    const ALLOW_CORS = true;

    /**
     * 跨域配置
     * @link https://github.com/tuupola/cors-middleware
     */
    const CORS_CONFIG = [
        "origin" => ["*"],
        "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"],
        "headers.allow" => [
            'X-HTTP-Method-Override',
            'Content-Type',
            'Accept',
            'Origin',
            'Authorization'
        ],
        "headers.expose" => [],
        "credentials" => false,
        "cache" => 0,
    ];

    /**
     * OAuth 需要的 RSA 秘钥；默认 2048 位
     */
    const PRIVATE_KEY_FILE = __DIR__ . "/../../resource/private2048.key";

    /**
     * OAuth 需要的 RSA 公钥；默认 2048 位
     */
    const PUBLIC_KEY_FILE = __DIR__ . "/../../resource/public2048.key";


    /**
     * 数据库配置
     */
    const DB = [
        'dbname' => '{{{dbSchema}}}',                // 数据库名
        'user' => '{{{dbUser}}}',                    // 数据库用户名
        'password' => '{{{dbPassword}}}',                // 数据库密码
        'port' => '{{{dbPort}}}',                         // 端口号
        'host' => '{{{dbHost}}}',              // 数据库地址
        'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
        'charset' => 'UTF8',                    // 数据库使用编码
        'driverOptions' => [
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    // \PDO::ATTR_CASE => \PDO::CASE_LOWER
]
    ];


    /**
     * 搜索使用的 Solr 配置
     */
    const ANALYZE_SERVERS = [
        'article_search' => [
            'host' => '{{{solrHost}}}',
            'port' => '{{{solrPort}}}',
            'path' => '/solr/db_article/',
            'timeout' => 30,
        ],
    ];


    /**
     * 重新分类主题的接口地址
     */
    const SUBJECT_REDO_CLASSIFY_URL = '{{{reclassifyUrl}}}/app/agent/subject_classifier_agent.php';

    /**
     * 置顶所设的分值
     */
    const STICKY_SCORE = 1000;


    /**
     * 手工添加文章所需要的默认网站编号
     */
    const DEFAULT_WEBSITE_NO_TO_ADD_ARTICLE = 'S0000';

    /**
     * 日志文件目录
     */
    const LOG_DIR = __DIR__ . '/../../log/';

    /**
     * 缓存目录
     */
    const CACHE_DIR = __DIR__ . '/../../runtime/';

    const WEIBO_API = 'http://192.168.1.161:8080/api';

    //采集批处理存放在web服务器上的目录
    const EXTRACTION_BATCH_FILE_DIR_APP = 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_All';
    //采集批处理存放在web服务器上的目录
    const EXTRACTION_LATEST_SEARCHWORD_BATCH_FILE_DIR_APP = 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_Latest_SearchWord';
    //WMT单独配置放至web服务器上的目录
    const EXTRACTION_WMT_CONFIG_DIR_APP = 'D:\\KWM\\Extraction_Server\\Extraction_Task\\WMT_Task';
    //采集模板第一步(采列表)目录
    const EXTRACTION_ARTICLE_LIST_TEMPLATE_DIR = 'D:\\KWM\\Extraction_Server\\Extraction_Task\\Core_Task\\Article_List\\';
    //采集模板第二步(采详细)目录
    const EXTRACTION_ARTICLE_DETAIL_TEMPLATE_DIR = 'D:\\KWM\\Extraction_Server\\Extraction_Task\\Core_Task\\Article_Detail\\';
    //WMT单独配置目录
    const EXTRACTION_WMT_CONFIG_DIR = 'D:\\KWM\\Extraction_Server\\Extraction_Task\\WMT_Task';
    //采集批处理存放在web服务器上的目录--指定某些客户或某些主题的
    const EXTRACTION_BATCH_FILE_DIR_APP_FOR_CUSTOM = 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_Client_Subject';

    const SPECIAL_SCHEDULE_BATCH = [
        '40782' => 'WebDataMinerCmd.exe %5 %6-%6 %3 "D:\KWM\Extraction_Server\Extraction_Task\Core_Task\Article_Detail\Article_Text_Extraction.wmt" /R /B /C=20 /F=1 /V={$website_no}=,{$content_by_website_no}=S_QL,{$Client_ID}=0,{$Subject_ID}=0,{$Priority_Level}=0,{$Schedule_ID}=%7,{$Date}=3,{$Save_Rule_From_Bat}=-1,{$Is_Subject_Track}=0,{$Need_Extra_Schedule}=0,{$IsOnlyExtractNewSearchWord}=0 /TextMode' . "\r\nexit",
        '41859' => 'WebDataMinerCmd.exe %5 %6-%6 %3 "D:\KWM\Extraction_Server\Extraction_Task\Core_Task\Article_Detail\Article_Text_Extraction.wmt" /R /B /C=20 /F=1 /V={$website_no}=,{$content_by_website_no}=S_Q,{$Client_ID}=0,{$Subject_ID}=0,{$Priority_Level}=0,{$Schedule_ID}=%7,{$Date}=3,{$Save_Rule_From_Bat}=-1,{$Is_Subject_Track}=0,{$Need_Extra_Schedule}=0,{$IsOnlyExtractNewSearchWord}=0 /TextMode' . "\r\nexit",
    ];

    const SCHEDULE_FIELD_DEFAULT_VALUE = [
        'Schedule_Name' => 'WEBSITE_NAME',// 调度名称默认值：网站名称
        'Schedule_Name_U' => '紧急搜索_WEBSITE_NAME',// U:紧急调度 默认名称：紧急搜索_网站名称
        'Schedule_Name_E' => '额外调度_WEBSITE_NAME',// U:额外调度 默认名称：紧急搜索_网站名称
        'Schedule_Name_C' => 'WEBSITE_NAME_客户_CLIENT_ID_SUBJECT_ID',// C:客户调度 默认名称：网站名称_客户_客户ID_主题ID
        // 普通调度 执行命令默认值
        'Execute_Command' => 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_All\\WEBSITE_NO\\run.bat',
        // U:紧急调度 执行命令默认值
        'Execute_Command_U' => 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_Latest_SearchWord\\WEBSITE_NO\\run.bat',
        // E:额外调度 执行命令默认值
        'Execute_Command_E' => 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_Extra_Schedule\\WEBSITE_NO\\run.bat',
        // C:客户调度 执行命令默认值
        'Execute_Command_C' => 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_Client_Subject\\WEBSITE_NO\\run_CLIENT_ID_SUBJECT_ID.bat',
        // O:其他调度 执行命令默认值
        'Execute_Command_O' => 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_Manual\\WEBSITE_NO\\run.bat',
        // 默认运行模式
        'Run_Mode' => 'MM',
        // 默认全部分组
        'Node_Group_Code' => 'A',
        'Pattern_Schedule_ID' => 7390,
    ];


    /**
     * 主题目录与主题导出模板路径
     */
    const SUBJECT_EXPORT_TEMPLATE_PATH = '../../client_resource/default/excel/subject_template/';


    /**
     * 系统默认logo和header图片
     */
    const CLIENT_LOGO_IMG_FILENAME = 'client_resource/default/ui/logos/logo.png';
    const CLIENT_HEADER_IMG_FILENAME = 'client_resource/default/ui/banners/banner.png';
    const CLIENT_FOOTER_IMG_FILENAME = 'client_resource/default/ui/footers/footer.png';

    // 原文高亮当自动监测编码失败时默认的原始编码
    const DEFAULT_ORIGINAL_CHARSET = 'gbk';


    /**
     * 客户系统更新的调度任务中的应用服务器的网站编号
     */
    const CLIENT_SYSTEM_UPDATE_TASK_SCHEDULE_APP_WEBSITE_NO = 'ST_APP';

    /**
     * 客户系统更新的调度任务中的采集服务器的网站编号
     */
    const CLIENT_SYSTEM_UPDATE_TASK_SCHEDULE_ES_WEBSITE_NO = 'ST_ES';

    /**
     * 客户系统配置更新包所在的路径
     */
    const CLIENT_SYSTEM_UPDATE_PACKAGE_PATH = 'F:\Release';

    /**
     * 客户应用服务器上的系统更新批处理存放目录
     */
    const CLIENT_APPLICATION_SERVER_SYSTEM_UPDATE_BATCH_FILE_DIR_APP = 'D:\\KWM\\Application_Server\\Run_Batch\\Run_Batch_System_Update\'';

    /**
     * 客户采集服务器上的系统更新批处理存放目录
     */
    const CLIENT_EXTRACTION_SERVER_SYSTEM_UPDATE_BATCH_FILE_DIR_APP = 'D:\\KWM\\Extraction_Server\\Run_Batch\\Run_Batch_System_Update\'';

    /**
     * 空指纹值，用来排除相似信息中计算错误
     */
    const EMPTY_FINGERPRINT = 'd41d8cd98f00b204e9800998ecf8427e';

    /**
     * 同步程序配置文件路径
     */
    const Sync_Progress_Configure_Path = 'D:\\KWM\\Database_Server\\DBSynchronizer\\Config\\';

}