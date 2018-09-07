# 安装说明

## 安装

双击 `Analysis_Server_x64_Setup.exe`，一直下一步直到完成即可

> 注意不要修改安装路径，暂时不支持修改安装路径

## 配置

可配置项目的说明文档，修改所有的配置前都应该先停止在运行的 Tomcat


### Tomcat 配置

Tomcat 版本为 `9.0.10`，Java 版本为 `1.8.0_172`


#### 修改端口号

- 修改 `D:\KWM\Base\Tomcat\conf\server.xml` 中修改 `<Connector port="8081" .../>`，修改 `8081` 为其他的端口号
- 重启 Tomcat


### Solr 配置

Solr 部署在 `D:\KWM\Analysis_Server\tomcat_root\solr`， 默认的索引存放目录在 `D:\KWM\Analysis_Server\Solr_Data`


#### 修改数据库导入信息

DataImport 组件用于将数据库中的文章导入到 Solr 中进行索引

- Core `db_article`，配置文件 `D:\KWM\Analysis_Server\tomcat_root\solr\solr_home\db_article\conf\db-data-config.xml`
- Core `db_article_content`，配置文件 `D:\KWM\Analysis_Server\tomcat_root\solr\solr_home\db_article_content\conf\db-data-config.xml`

修改配置文件中第 3 行的数据库地址 url

```xml
<dataSource type="JdbcDataSource" encoding="UTF-8" driver="com.mysql.jdbc.Driver" url="jdbc:mysql://192.168.1.xxx:3306/mymonitor?autoReconnect=true" batchSize="-1" user="mmt_app" password="poms@db"/>
```


#### 修改索引存放目录

复制 `D:\KWM\Analysis_Server\Solr_Data` 的目录到目标盘，例如：`E:\Solr_Data`，然修改如下两个位置的文件

- `D:\KWM\Analysis_Server\tomcat_root\solr\solr_home\db_article\core.properties` 修改 `dataDir=D:/KWM/Analysis_Server/Solr_Data/db_article/data` 为 `dataDir=E:\Solr_Data\db_article\data`
- `D:\KWM\Analysis_Server\tomcat_root\solr\solr_home\db_article_content\core.properties` 修改 `dataDir=D:/KWM/Analysis_Server/Solr_Data/db_article_content/data` 为 `dataDir=E:\Solr_Data\db_article_content\data`


### 分析程序配置

TODO


### 热词分析程序配置

TODO


## 卸载

如何彻底卸载


### 服务

安装时创建了名为 `KWM_Tomcat` 和 `KWM_Apache` 的服务

1. 可以使用目录下 `D:\KWM\Base\Init\Uninstall_Tomcat.bat` 删除服务
2. 使用具有管理员权限的命令行中运行 `SC DELETE KWM_Tomcat`

1. 可以使用目录下 `D:\KWM\Base\Init\Uninstall_Apache.bat` 删除服务
2. 使用具有管理员权限的命令行中运行 `SC DELETE KWM_Apache`


### 环境变量

将系统环境变量 `Path` 中配置的如下值删除

- `D:\KWM\Base\PHP` PHP
- `D:\KWM\Base\JDK\bin` Java
- `D:\KWM\Base\Python;D:\KWM\Base\Python\Scripts` Python
- `D:\KWM\Base\Apache\bin` Apache
- `D:\KWM\Base\Tomcat\bin` Tomcat

删除 `JAVA_HOME`、`JRE_HOME`、`CATALINA_HOME` 环境变量


### 文件

在双击 `D:\KWM\Analysis_Server\unins000.exe` 即可启动卸载程序，会删除安装时复制的文件；可能会留下一些运行之后的文件，比如日志、数据之类的。

如果是单独安装的独立的分析服务器可以简单的将 `D:\KWM` 删除即可



