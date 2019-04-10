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