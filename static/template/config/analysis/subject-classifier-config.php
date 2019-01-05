<?php
/* SourceGuardian:DO_NOT_ENCODE */
/*
 * 基本配置文件
 *
 */

/*
 * 项目根目录
 */
define('ROOT_BASE_PATH', dirname(dirname(__FILE__)));

/*
 * 数据库配置
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '{{{dbHost}}}');
define('DB_PORT', '{{{dbPort}}}');
define('DB_NAME', '{{{dbSchema}}}');
define('DB_USER', '{{{dbUser}}}');
define('DB_PWD', '{{{dbPassword}}}');

//===========================================================================================================
/*
 * 搜索模块基本参数配置
 */
define('CFG_SEARCH_MODULE_SOLR_HOST', '{{{solrHost}}}');
define('CFG_SEARCH_MODULE_SOLR_PORT', '{{{solrPort}}}');

define('CFG_SEARCH_MODULE_SOLR_CORE_ARTICLE', '/solr/db_article'); //基于文章（article_detail）的分类
define('CFG_SEARCH_MODULE_SOLR_CORE_ARTICLE_CONTENT', '/solr/db_article_content'); //基于文章内容（article_content）的分类

define('CFG_CLASSIFY_TYPE_ARTICLE_DETAIL', 'article_detail');
define('CFG_CLASSIFY_TYPE_ARTICLE_CONTENT', 'article_content');

//===========================================================================================================

/*
 * 时间区间设置
 */
define('CFG_TIMEZONE', 'Asia/Shanghai');
date_default_timezone_set(CFG_TIMEZONE);
//===========================================================================================================

define('SOLR_IMPORT_PROCESS_ARTICLE_COUNT', 50000); //每次创建索引的文章数量
define('CFG_SOLR_AUTO_COMMIT_INTERVAL_HOURS', 25);//Solr commit提交的间隔,用于清空FieldCache,防止OOM溢出,从每天0点起隔N个小时一次。索引文件很大，超过JVM内存大小时应增加频率。算法是当前小时为N的倍数即运行
define('CFG_SOLR_AUTO_OPTIMIZE_HOUR', 25);//Solr Optimize提交的时间,用于整理索引文件碎片，优化查询速度,可以每天一次, 算法是当前小时=N即运行。

//Solr索引保留多少天
define('CFG_SOLR_INDEX_KEEP_DAYS', {{{solrIndexKeepDays}}});


//分类相关参数
define('CFG_CLASS_LOG_TO_FILE', 'on'); //要不要记录分类详细日志
define('EVENT_LOG_FILE_NAME', 'classify_event.log');
define('ERROR_LOG_FILE_NAME', 'classify_error.log');
define('LONG_TIME_SUBJECT_LOG_FILE_NAME', 'long_time_subject.log');
define('SUBJECT_KEYWORD_COUNT_LOG_FILE_NAME', 'subject_keyword_count.log');
define('TIME_LOG_FILE_NAME', 'classify_time.log');
define('SOLR_SERVICE_NOT_AVAILABLE', 'solr_service_not_available.log');
define('LONG_TIME_SECOND', 20); //超过多少秒就记录到日志

define('CLASSIFY_POOL_SIZE', 40); //线程池最多装的分类线程数; 最多只能设置50个线程
define('ARTICLE_CLASSIFY_PROCESS_ARTICLE_COUNT', 50000); //每次分类的文章数量
define('CLASSIFY_BACKTRACK_DAYS', 5);
define('CLASSIFY_SUBJECT_DURING_MAX_TIME', 100); //每个主题允许分类的最长时间，秒为单位，时间到了，就算没分完，也停止，避免影响其它分类
define('MAX_KEYWORD_PAGE_SIZE', 30000);    //每次最多查询的关键词数，关键词的组合查询结果太多，要限制

define('UTC_OFFSET_HOURS', intval(date('Z') / 3600) * -1);
define('CFG_SOLR_TIME_OFFSET_HOURS', strlen(UTC_OFFSET_HOURS) > 0 ? ((UTC_OFFSET_HOURS > 0 ? '+' : '') . UTC_OFFSET_HOURS . 'HOURS') : '');

define('CFG_ARTICLE_SOLR_STAT_MAX_SIZE', 900);//SOLR Subject 一次统计的最大结果数，对应StatArticleSubject,以PKBegin和PKEnd.如果超出,则要拆分成多次统计
define('CFG_CLASSIFY_DATA_DIR', ROOT_BASE_PATH . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
define('SOLR_CLASSIFY_ENABLE_RELEVANCY_SCORE', 'off');

define('CFG_CLASSIFY_FILTER_TYPE', 'C'); //分类过滤类型  A==>基于标题与摘要 C==>基于标题、摘要与正文

define('CFG_SQLITE_BATCH_INSERT_SIZE', 50);

define('CFG_ARTICLE_TITLE_WEIGHT_DEFAULT_VALUE', 2); //标题的缺省权重
define('CFG_ARTICLE_ABSTRACT_WEIGHT_DEFAULT_VALUE', 1); //摘要的缺省权重
define('CFG_ARTICLE_CONTENT_WEIGHT_DEFAULT_VALUE', 1); //正文的缺省权重

define('CFG_AUTO_CLASSIFY_NEED_ANALYSIS_WORD', false);  //自动分类是否需要分词处理，默认不需要

define('CFG_PHRASE_WINDOWS_DEFAULT_LENGTH', 15); //主题的分类核心词的窗口长度默认值，15表示15个有效的词或字的距离
define('CFG_SENTIMENT_WINDOWS_DEFAULT_LENGTH', 15); //主题的正负面判断窗口长度默认值，15表示15个有效的词或字的距离

define('CFG_WORD_DIVISION_EXPANSION_COEFFICIENT', 2); //solr 中文分词膨胀系数， 默认为2

define('CFG_SUBJECT_CLASSIFY_TIME_LIMIT', 0.5); //主题分类时间限制，单位：小时，默认0.5

//分布式分类 （有多台分类服务器）  策略：指定服务器数量(2)，本机的ID (1,2), 支持多个，以英文逗号分隔
define('SOLR_CLASSIFY_MUTI_SERVERS', 'off');  // 是否启用多台分类服务器，off 或 on
define('SOLR_CLASSIFY_SERVER_COUNT', 1);   //分类服务器数量 默认为 1
define('SOLR_CLASSIFY_SERVER_NODE_NUMS', '1');   //分类服务器本机的编号，从1开始，可以支持多个，以逗号分隔，默认为 1

define('SOLR_CLASSIFY_SERVER_ID', '10');      // 分类服务器本机的IP最后一段十进制数，例如192.168.1.10，SERVER_ID为10

//主题情感级别，用于分开处理分类情感词多的主题
define('CFG_CLASSIFY_SENTIMENT_LEVEL_MIN', 0);
define('CFG_CLASSIFY_SENTIMENT_LEVEL_MAX', 100);

//评分参数设置
define('RELEVANCY_PROCESS_ARTICLE_COUNT', 1000);
define('SCORE_ERROR_LOG_FILE_NAME', 'score_error.log');
define('SCORE_TIME_LOG_FILE_NAME', 'score_time.log');
