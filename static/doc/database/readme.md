# 安装说明

## 安装

双击 `Database_Server_x64_Setup.exe`，一直下一步直到完成即可

> 注意不要修改安装路径，暂时不支持修改安装路径

## 配置

可配置项目的说明文档，修改所有的配置前都应该先停止在运行的 MySQL


### MySQL

MySQL 版本为 `8.0.11`，一般需要修改的配置有两项

- MySQL 数据存放的目录
- MySQL 内存大小的配置


#### Data 目录

默认情况下，Data 目录在 `D:\KWM\Database_Server\Data`，如果想要修改这个目录所在的位置需要修改如下几个地方

- 如果已经启动 MySQL 服务，停止已经启动的服务名称 `KWM_MySQL`
    + 使用服务面板，或者任务管理器的服务面板找到 `KWM_MySQL` 停止服务
    + 使用命令行执行命令（需要管理员权限） `NET STOP KWM_MySQL`
- 移动 `Data` 目录；比如将默认目录 `D:\KWM\Database_Server\Data` 配置到 `E:\MySQL_Data` 下，将 `Data` 目录复制、剪贴到 E 盘对应的目录
- 修改 MySQL 配置文件 `D:\KWM\Base\MySQL\my.ini`，将所有配置为 `D:\KWM\Database_Server\Data` 的替换为目标目录


#### 调整 MySQL 的内存大小

> 如果是专门的数据库服务器，一般调整为机器内存的 80% 左右

修改 `D:\KWM\Base\MySQL\my.ini` 中修改 `innodb_buffer_pool_size` 的值

> 另外实际使用内存可能会上浮 10% 左右


#### 从库配置

> TODO


## 同步配置

> TODO


## 卸载

如何彻底卸载

### 服务

安装时创建了名为 `KWM_MySQL` 的服务

1. 可以使用目录下 `D:\KWM\Base\Init\Uninstall_MySQL.bat` 删除服务
2. 使用具有管理员权限的命令行中运行 `SC DELETE KWM_MySQL`


### 环境变量

将系统环境变量 `Path` 中配置的 `D:\KWM\Base\MySQL\bin;D:\KWM\Base\PHP` 删除即可


### 文件

在双击 `D:\KWM\Database_Server\unins000.exe` 即可启动卸载程序，会删除安装时复制的文件；可能会留下一些运行之后的文件，比如日志、数据之类的。

如果是单独安装的独立的数据库服务器可以简单的将 `D:\KWM` 删除即可





