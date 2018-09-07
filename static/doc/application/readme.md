# 安装说明

## 安装

双击 `Application_Server_x64_Setup.exe`，一直下一步直到完成即可

> 注意不要修改安装路径，暂时不支持修改安装路径


## 配置

可配置项目的说明文档

- Apache 端口配置
- 应用程序配置


### Apache 配置

Apache 版本为 `2.4.33`，Apache 的配置文件位于 `D:\KWM\Base\Apache\conf\httpd.conf`

修改端口号：打开配置文件 `httpd.conf`，找到大概大约第 58 行，默认监听了 2 个端口 `80`，`8181`

```
Listen 80
Listen 8181
```

可以修改、删除、增加端口，保存之后重启 Apache 服务即可生效


### 配置应用

应用分 2 个模块，kwm 和 kwmcloud 模块，目录分别位于

- `D:\KWM\Application_Server\www_root\kwm`
- `D:\KWM\Application_Server\www_root\kwmcloud`

<!-- 另外现在的应用架构服务端 server 和 客户端 client 是可以分开部署的 -->


#### 服务端配置

kwm 服务端配置，主要可修改的配置有如下几项

- 数据库配置
- 全文搜索配置
- 重新分类接口配置

配置文件路径 `D:\KWM\Application_Server\www_root\kwm\server\app\lib\Config\Configure.php`

1. 数据库配置，在配置文件中找到如下位置，进行相应的修改

这里 IP 地址应该填写为数据库服务器部署的地址

```php
/**
 * 数据库配置
 */
const DB = [
    'dbname' => 'mymonitor',                // 数据库名
    'user' => 'mmt_app',                    // 数据库用户名
    'password' => 'xxxxxx',                 // 数据库密码
    'port' => 3306,                         // 端口号
    'host' => '192.168.1.xxx',              // 数据库地址
    'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
    'charset' => 'UTF8',                    // 数据库使用编码
    'driverOptions' => [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ]
];
```

2. 全文搜索配置，在配置文件中找到如下配置，进行相应的修改

这里的 IP 地址应该填写分析服务器部署的 IP 地址

```php
/**
 * 搜索使用的 Solr 配置
 */
const ANALYZE_SERVERS = [
    'article_search' => [
        'host' => '192.168.1.xxx',          // IP
        'port' => 8081,                     // 端口
        'path' => '/solr/db_article/',      // Core 的路径
        'timeout' => 30,                    // 超时时间
    ],
];
```

3. 重新分类接口配置，在配置文件中找到如下位置，进行相应的修改

这里的 IP 应该填写为分类程序部署的 IP 地址

```php
/**
 * 重新分类主题的接口地址
 */
const SUBJECT_REDO_CLASSIFY_URL = 'http://192.168.1.xxx/analysis_server/subject_classifier/app/agent/subject_classifier_agent.php';
```

kwmcloud 服务端配置，主要可修改的配置有如下几项

配置文件路径 `D:\KWM\Application_Server\www_root\kwmcloud\server\app\lib\Config\Configure.php`

- 数据库配置
- 全文搜索配置

1. 数据库配置

这里 IP 地址应该填写为数据库服务器部署的地址

```php
/**
 * 数据库配置
 */
const DB = [
    'dbname' => 'mymonitor',                // 数据库名
    'user' => 'mmt_app',                    // 数据库用户名
    'password' => 'xxxxxx',                 // 数据库密码
    'port' => 3306,                         // 端口号
    'host' => '192.168.1.xxx',              // 数据库地址
    'driver' => 'pdo_mysql',                // PDO驱动，固定为MySQL，请勿修改
    'charset' => 'UTF8',                    // 数据库使用编码
    'driverOptions' => [
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ]
];
```

2. 全文搜索配置，在配置文件中找到如下配置，进行相应的修改

这里的 IP 地址应该填写分析服务器部署的 IP 地址

```php
/**
 * 搜索使用的 Solr 配置
 */
const ANALYZE_SERVERS = [
    'article_search' => [
        'host' => '192.168.1.xxx',          // IP
        'port' => 8081,                     // 端口
        'path' => '/solr/db_article/',      // Core 的路径
        'timeout' => 30,                    // 超时时间
    ],
];
```

#### 客户端配置

现行的架构被设计为客户端和服务端可以独立部署，默认为部署在一起

独立部署配置文档 TODO


## 卸载

如何彻底卸载


### 服务

安装时创建了名为 `KWM_Apache` 的服务

1. 可以使用目录下 `D:\KWM\Base\Init\Uninstall_Apache.bat` 删除服务
2. 使用具有管理员权限的命令行中运行 `SC DELETE KWM_Apache`


### 环境变量

将系统环境变量 `Path` 中配置的如下值删除

- `D:\KWM\Base\PHP` PHP
- `D:\KWM\Base\Apache\bin` Apache


### 文件

在双击 `D:\KWM\Analysis_Server\unins000.exe` 即可启动卸载程序，会删除安装时复制的文件；可能会留下一些运行之后的文件，比如日志、数据之类的。

如果是单独安装的独立的分析服务器可以简单的将 `D:\KWM` 删除即可