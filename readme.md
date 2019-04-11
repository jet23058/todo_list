## 專案部署簡介
```
Project(專案位置)
├── Dockerfile
├── docker-compose.yaml
│   ├── build
│      ├── zh-tw(國際版)
│         ├── build_production.sh
│         ├── build_stage.sh
│         └── env(環境設定檔)
│             ├── local.env
│             ├── stage.env
│             └── production.env
|      ├── conf(Dockerfile config)
│         ├── laravelcron(laravel schedule)
│         ├── nginxconf(nginx設定檔)
│         └── site_default(nginx site-available設定檔)
└── README.md(專案說明文件)
```

### 如何部署
```
1. 選擇需部署的版本
2. 進對應的build版本執行shell script
3. 進入要部署的機器，抓取docker image,然後docker-compose up -d
```

### 程式架構
```
1. route: RouteServiceProvider, route.php
2. JWT token: app\Http\Middleware
3. 驗證：app\Http\Requests
4. MVC: app\Http\Controllers, app\Services, app\Repositories, app\Models, app\Http\Resources
5. response: app\Providers\CustomResponseServiceProvider
```

### api lists
```
* get all to-do lists: {{domain}}/api/to-do
* get one to-do list: {{domain}}/api/to-do/6
* create one to-do list: {{domain}}/api/to-do
* update one to-do list: {{domain}}/api/to-do/1
* delete one to-do list: {{domain}}/api/to-do/2
* delete all to-do list: {{domain}}api/to-do/delete-all
```