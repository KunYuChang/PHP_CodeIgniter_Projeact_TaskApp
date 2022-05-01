# PHP_CodeIgniter_Projeact_TaskApp

[TOC]

## 簡介及項目設置

### 建立專案

```php
composer create-project codeigniter4/appstarter task-app
```

### 設置開發模式

🤔 要幹嘛?

1. 可顯示 Debug 訊息
2. 可使用 Debug 工具

🤔 如何設定?

1. 專案剛建立時，會有一個`env`檔案，改名為`.env`。
2. 檔案內容更改為 : `CI_ENVIRONMENT = development`

- 這是一個環境變數設定檔。(Environment Configuration file)
- `.env`是框架才有的設計

## MVC 基礎

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

## 處理重覆的 HTML Code

- 👎 方法 1 (Controllers view)

1. 拆出重覆的 Code 到獨立的檔案
2. Controllers view 出來
3. 意味著 Controllers Code 會比較臃腫
4. CI 早期版本常見
5. 我稱為"寄人籬下方法"

- 🤏 方法 2 (include)

1. View 使用 CI 提供的 include 方法, 接近原生用法
2. 有時候會用到
3. 我稱為"黑暗大法師方法"

- 👍 方法 3 (layout)

1. 框架常見
2. 客製化最簡單
3. 我稱為"挖洞放進去方法"

## Database

1. models
2. configuration
3. migrations

### 顯示動態資料, 將數據從 Controllers 傳到 View

1. View 包含顯示此資料所需的最小程式碼
2. 框架中 View 不進行複雜的資料操作或計算
