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
    const MAIN_DB = [
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
    // 133 数据库
    const EXTRA_DB = [
        'dbname' => 'mymonitor',                // 数据库名
        'user' => 'root',                    // 数据库用户名
        'password' => 'poms@db',                // 数据库密码
        // 'password' => 'root',                // 数据库密码
        'port' => 3306,                         // 端口号
        'host' => '192.168.1.133',              // 数据库地址
        // 'host' => 'localhost',              // 数据库地址
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

    const WEIBO_API = 'http://weibo.app.org/api';

    // 采集批处理存放在web服务器上的目录
    const EXTRACTION_BATCH_FILE_DIR_APP = 'D:\\kwm\\Extraction_Server\\Run_Batch\\Run_Batch_All';

    /**
     * 系统默认logo和header图片
     */
    const CLIENT_LOGO_IMG_FILENAME = 'client_resource/default/ui/logos/logo.png';
    const CLIENT_HEADER_IMG_FILENAME = 'client_resource/default/ui/banners/banner.jpg';


    const CFG_SOLR_TIME_OFFSET_HOURS = '-8HOURS';



    /**
     * 根据调度模式添加新的调度任务时,随机偏移时间以分钟为单位
     */
    const CFG_SCHEDULE_PATTERN_RUN_DAY_START_TIME_RANDOM = 10;


    /**
     * 是否是乐思运营商,添加的网站以S(==1)/U(==0)开头。
     */
    const IS_KNOWLESYS = 1;

    /**
     * 内网 IP 的数据存放位置
     */
    const LAN_IP_DATA = __DIR__ . '/../../../external_resource/lan_ip_monitor/lan_ip_data.csv';

    /**
     * DSL 数据存放的目录，请以 `/` 结尾
     */
    const DSL_DATA_DIR =  __DIR__ . '/../../../external_resource/dsl_monitor/';
}