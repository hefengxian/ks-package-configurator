<?php
/*
 * Copyright © 2016-present, Knowlesys, Inc.
 * All rights reserved.
 *
 * SourceGuardian:DO_NOT_ENCODE
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
     * 通用数据库配置
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
        ]
    ];

    /**
     * 只读数据库信息，一般配置了从库才需要如此配置
     * 如果只有一个数据库两个配置保持一致即可
     */
    const READ_ONLY_DB = [
        'dbname' => '{{{dbSchema}}}',                // 数据库名
        'user' => '{{{roDbUser}}}',                    // 数据库用户名
        'password' => '{{{roDbPassword}}}',                // 数据库密码
        'port' => '{{{dbPort}}}',                         // 端口号
        'host' => '{{{roDbHost}}}',              // 数据库地址
        'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
        'charset' => 'UTF8',                    // 数据库使用编码
        'driverOptions' => [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ]
    ];


    /**
     * 运营后台监测的应用主库配置
     */
    const MONITOR_MAIN_DATABASE_CONFIGURE = [
        'dbname' => 'mymonitor',                // 数据库名
        'user' => 'root',                       // 数据库用户名
        'password' => 'poms@db',                // 数据库密码
        'port' => 3306,                         // 端口号
        'host' => '{{{dbHost}}}',              // 数据库地址
        'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
        'charset' => 'UTF8',                    // 数据库使用编码
        'driverOptions' => [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ]
    ];


    /**
     * 运营后台监测的所有数据库配置列表
     */
    const MONITOR_DATABASE_CONFIGURE_LIST = [
        // 应用主数据库
        'DB' => [
            'dbname' => '{{{dbSchema}}}',                // 数据库名
            'user' => '{{{dbUser}}}',                    // 数据库用户名
            'password' => '{{{dbPassword}}}',                // 数据库密码
            'port' => '{{{dbPort}}}',                         // 端口号
            'host' => '{{{dbHost}}}',              // 数据库地址
            'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
            'charset' => 'UTF8',                    // 数据库使用编码
            'driverOptions' => [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]
        ],
        // 从库
        'RO_DB' => [
            'dbname' => '{{{dbSchema}}}',                // 数据库名
            'user' => '{{{roDbUser}}}',                    // 数据库用户名
            'password' => '{{{roDbPassword}}}',                // 数据库密码
            'port' => '{{{dbPort}}}',                         // 端口号
            'host' => '{{{roDbHost}}}',              // 数据库地址
            'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
            'charset' => 'UTF8',                    // 数据库使用编码
            'driverOptions' => [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]
        ],
    ];

    /**
     * Solr分析搜索服务器配置列表
     */
    const SOLR_SERVER_CONFIGURE_LIST = [
        // 分析主服务器
        'Main_Solr' => [
            'Server_type' => '主服务器',
            'solr_admin_url' => 'http://{{{solrHost}}}:{{{solrPort}}}/solr/index.html#/',
        ],
    ];
    /**
     * ES历史库配置列表
     */
    const ES_SERVER_CONFIGURE_LIST = [
        /*'ElasticSearch' => [
            'main_url' => 'http://192.168.1.231:5601',
            'check_state_url' => 'http://192.168.1.231:9200/_cat/health',
        ],*/
    ];


    /**
     * Redis库配置列表
     */
    const REDIS_SERVER_CONFIGURE_LIST = [
        'Redis' => [
            'name' => 'db0',       // 库名
            'info_url' => 'http://192.168.2.230:7379/info',      // 配置信息查看地址
            'check_state_url' => 'http://192.168.1.230/hexists/detail_md5_hash?key=fc2a2a5f526cbd4c0efdfe0c7c19e3a8',   // 检查运行状态地址
            'detail_md5_count_url' => 'http://192.168.2.230:7379/hlen/detail_md5_hash',     // 查看Detail Md5 缓存总数地址
        ],
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
     * 微博传播分析的接口地址
     */
    const WEIBO_API = 'http://192.168.1.120:8383/sinaWeiboSpreadAnalyzer';


    /**
     * IK词典热更新的地址
     */
    const IK_DICTIONARY_UPDATE_URL = 'http://{{{solrHost}}}:{{{solrPort}}}/solr/db_article/IKDicUpdateHandler';


    /**
     * 分类新建主题的接口地址，用solr主服务器分类，速度更快
     */
    const SUBJECT_DO_CLASSIFY_URL = '{{{reclassifyUrl}}}/app/agent/subject_classifier_agent.php';

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


    /**
     * 限制客户启用的情感词数
     */
    const CLIENT_IS_ENABLED_SENTIMENT_WORDS_COUNT_LIMIT = 5000;

    /**
     * 正式客户的搜索词是否订阅微博缺省值
     */
    const CLIENT_TO_SEARCH_KEYWORD_IS_FOR_SNS_WEBSITE_DEFAULT_VALUE_FOR_FORMAL_CLIENT = 1;

    /**
     * 试用客户的搜索词是否订阅微博缺省值
     */
    const CLIENT_TO_SEARCH_KEYWORD_IS_FOR_SNS_WEBSITE_DEFAULT_VALUE_FOR_TRIAL_CLIENT = 0;

    // 同步最大延时(秒)，InformGenerator 中使用，当最早待同步记录 等待时间超过此值时，认为同步异常
    const SYNC_MAX_DELAY_TIME = 3600;

}