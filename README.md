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

### 設定資料庫連線

有兩個地方可以設定資料庫連線

1. [Database Configuration](https://codeigniter.com/user_guide/database/configuration.html)
2. `.env`

### Database Migrations

1. 中翻資料庫遷移(!?)
2. PHP 處理資料庫操作
3. 遷移是一種資料庫的版本控制，讓團隊能夠輕鬆的修改跟共享應用程式的資料庫結構。
4. 可以手動創建 Migration, 但可以用指令創建更為簡單
5. 使用 Database Forge Class 來操作資料庫

創建 migrate 檔案指令

```php
// 語法
php spark migrate:create <自定義名稱>

// 範例
php spark migrate:create create_task
```

執行 migrate 檔案指令

```php
// 執行
php spark migrate

// 退回
php spark migrate:rollback
```

- [Database Migrations](https://codeigniter.com/user_guide/dbmgmt/migration.html)

### Models

1. 命名通常為 : 資料表名稱+Model
2. 使用 Codeigniter 提供的方法來取得資料

### Debugging

1. 開啟除錯列(超好用)，設置方法參考官網，其中一個方法是把`.env`
   app.baseURL 設置跟打開的網址一樣，可以看到 Database 時間確認效能.....等等
2. dd Function

```php
// 普通的PHP除錯要這樣
echo '<pre>';
var_dump($data);
echo '</pre>';
exit

// CI可以用dd做到一樣的事情，還更精美 (好用!)
dd($data);
```

[Debugging](https://codeigniter4.github.io/userguide/testing/debugging.html)

## CRUD

### 顯示單筆資料

```php
    public function show($id)
    {
        $model = new \App\Models\TaskModel;
        $task = $model->find($id);

        // dd($task);

        return view('Tasks/show', [
            'task' => $task
        ]);
    }
```

### 使用 site_url helper 來處理頁面之間的連結

Q: a 連結就可以辦到，那為什麼要使用這個?
A: 為了更好的靈活性，舉例來說，測試機與正式機檔案放置路徑不同。

site_url function 會回傳當前網站完整的網址

[URL Helper](https://codeigniter.com/user_guide/helpers/url_helper.html#site_url)

### 使用 form helper 來處理表單

Q:由於有許多地方都會用到 form helper，可以引入使用，但感覺很麻煩
A:可以到 BaseController.php 去設定全部的網頁都要使用。

```php
protected $helpers = ["form"];
```

### 處理已提交表單

1. 如果是原生的會去檢查$\_POST

```php
$something = isset($_POST['foo'] ? $_POST['foo'] : NULL);
```

2. Codeigniter 提供比較簡單的方法

```php
// 如果沒有值會直接回傳NULL
$something = $request->getPost('foo');
```

[Retrieving Input](https://codeigniter.com/user_guide/incoming/incomingrequest.html#retrieving-input)

3. 把資料存入資料庫

[Saving Data](https://codeigniter.com/user_guide/models/model.html#saving-data)

4. Model 預設會對欄位名稱把關，把要輸入的設置為允許。

[Configuring Model](https://codeigniter.com/user_guide/models/model.html#configuring-your-model)

### 對表單進行驗證

Model 設定 description 欄位不能為空

```php
    protected $validationRules = [
        'description' => 'required'
    ];
```

Controllers

```php
    $result = $model->insert([
        'description' => $this->request->getPost("description")
    ]);

    if ($result === false) {
        dd($model->errors());
        // 會得到一個預設的錯誤訊息
        // "The description field is required."
    } else {
        dd($result);
    }
```

可以自定義錯誤訊息

```php
    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a description'
        ]
    ];
```

### 轉址
