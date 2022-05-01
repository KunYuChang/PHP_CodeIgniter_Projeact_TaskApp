# PHP_CodeIgniter_Projeact_TaskApp

## 建立專案

```php
composer create-project codeigniter4/appstarter task-app
```

## 設置開發模式

🤔 要幹嘛?

1. 可顯示 Debug 訊息
2. 可使用 Debug 工具

🤔 如何設定?

1. 專案剛建立時，會有一個`env`檔案，改名為`.env`。
2. 檔案內容更改為 : `CI_ENVIRONMENT = development`

- 這是一個環境變數設定檔。(Environment Configuration file)
- `.env`是框架才有的設計

## 建立第一個 View

1. Controllers 會使用到框架函式 view , 可以省略`.php`副檔名
2. View 最好建立一個跟 Controllers 對應的資料夾

## 框架 Router

Router 決定執行哪個 Controller & Method

```
exaple.com/ControllerClass/ClassMethod/ParamID
```

Router 有設定檔

```
app > Config > Rotes.php
```

## 新增 Controller , View 顯示任務清單

1. 新增`app/Controllers/Tasks.php`
2. Controllers 新增的檔名要大寫開頭
