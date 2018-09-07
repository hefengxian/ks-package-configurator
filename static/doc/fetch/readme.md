# 安装说明

## 安装

双击 `Fetch_Server_x64_Setup.exe`，一直下一步直到完成即可

> 注意不要修改安装路径，暂时不支持修改安装路径


## 配置

可配置项目的说明文档

- 微博 API 配置（商业 API 一般没有这个功能）


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