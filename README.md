# FunctionCloud

Excel云公式，可以在云端使用php编写代码处理Excel数据

>Excel的自带公式和vba在处理多表格数据时还是很有优势的，但在处理一个单元格中较复杂的数据时就力不从心了，对数据的查找，分析，分割都不够灵活，FunctionCloud可以解决这个问题，通过将数据提交到云端，采用php来分析处理数据，极大降低了处理难度。特别是企业内部自定义数据和功能，方便各种公式和自有算法的统一管理。

###服务器

架设php服务器，并将`excelserver`文件夹中的内容复制到php服务器，可以通过web访问其中的`api.php`文件和`admin`文件夹。

>api.php用于与Excel宏通讯，admin文件夹用于编辑php公式

**提示:** 用户自行编写的php公式代码存放在functions文件夹中

###客户端
编辑Function_cloud宏，将其中的服务器地址修改为你使用的服务器地址。用Excel打开宏文件`function_cloud.xla`，按`ALT+F11`，编辑宏，设置常量server的值为服务器地址，修改后保存。

>修改完毕后将`function_cloud.xla`安装到用户电脑，用户即可使用云函数功能

```
在Excel中使用公式
 	=cloud("key",参数1,参数2,参数3,其他任意个参数)
 其中：
 	key表示要调用的云函数的标识，标识分级管理，对应服务器系统的文件夹和文件位置。
 	key使用 点 “.” 进行分割，中文句号也是可以的，但不推荐。key支持中文和英文，数字。
 	例如：
 	key "公共.数学.计算排名"  对应服务器系统中functions文件夹下的  公共/数学/计算排名.php  文件。
 	编辑此文件就可在Excel中调用此文件的功能。
 	用户输入=cloud("公共.数学.计算排名",所需参数)即可得到该php计算的结果。
 	
 	另外，提供cloud_help()函数，直接通过浏览器打开服务器的help目录，用于在线显示帮助信息。
 	提供cloud_version()函数，返回版本信息。
```
**提示:** function_cloud.xla可以通过打包软件打包，并通过修改注册表完成自动加载宏的功能，实现exe形式的安装包。用户安装后即可使用云函数

###公式编写

通过浏览器访问admin文件夹，可打开在线编辑器。在左侧创建目录和php文件，编辑修改php文件，保存后即可在Excel中调用。

**提示:** 新建php公式文件后会有编写模板和可用函数说明，参考说明完成编写

###扩展

本代码只是一个功能框架，没有用户认证，权限，公式分配，帮助等功能，可根据需要自行扩展这些功能。

**注意:** php服务器可以启用chroot函数，并调整api.php代码使用chroot处理用户编写的脚本，或者在保存脚本时对脚本进行审查，屏蔽不安全的功能和函数，否则，理论上用户编写的脚本包含恶意功能，会影响其他用户和服务器安全。当然，如果只是一个人管理、编写公式，则可不必考虑这些问题。



