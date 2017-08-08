#说明
>1、下载后，需要composer update

>2、需要给予bootstrap/ storage/ 可读写权限 

>3、需要删除php.ini->disable_functions里面的函数：proc_open，proc_get_status，exec

>4、lnmp1.4需要执行/lnmp/tools/remove_open_basedir_restriction.sh来解决跨目录的问题。

>5、需要在虚拟机文件nginx.conf增加:

    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }