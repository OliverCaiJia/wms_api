# wms_api

Flash Express wms api



## Development


### 项目说明：


名词|主要功能|访问路径|
----|----|----|----|
openapi|网关|
ok\_php\_base|插件|
www_api|wms的api|自定义访问域名
www_fe|wms的前端|自定义访问域名


### 工作目录

git上的所有代码，暂时clone到`/opt/ok/`下


### Database信息

* user: web
* hosts: bo.ok.com
* password: 8xEHaHnIvw
* DB name: wms

> hosts在最后



### nginx 配置

1、www_fe前端配置文件

~~~~
server {
	listen 80;
	server_name flash.wms.com; 
	set $FLASH_WMS_FE_ROOT /opt/ok/wms_fe;
	location / {
                root $FLASH_WMS_FE_ROOT/wwwroot/;
                index index.html index.htm;
        }

    location ~ /(fonts|slim|bower|bower_components)/ {
                root $FLASH_WMS_FE_ROOT/static/;
                index index.html index.htm;
        }

	location /upload/ {
		root $FLASH_WMS_FE_ROOT/;
		 index index.html index.htm;

        }

	gzip on;
	gzip_types application/javascript application/json;
}
~~~~


2、`/etc/nginx/fastcgi_php.conf`的配置

~~~~

	location ~ \.php {
		fastcgi_pass 127.0.0.1:9000;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
		include fastcgi_params;
	}
~~~~



3、`wms_api`API的配置

git地址：`https://git.opskitchen.com/FlashExpressWms/openapi.git`

~~~~
server {
	listen 80;
	server_name wms-api.wms.com;
	root /opt/ok/flash_openapi/entrances/web/gateway;
	index index.php;
	gzip on;
	gzip_types application/json application/javascript;

	location / {
		try_files $uri $uri/ /index.php?$args;
	}

	include fastcgi_php.conf;
}
~~~~


### hosts绑定

~~~~~~
47.96.7.107 i18n.ok.com
47.96.7.107 bo.ok.com
47.96.7.107 i18n.strings.tech

192.168.56.101 flash.wms.com
192.168.56.101 flash-api.wms.com

~~~~~~





