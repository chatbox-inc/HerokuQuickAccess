# HerokuQuickAccess

## 構築方法

````
$ composer install
$ php artisan migrate
$ npm i
$ npm run watch
````

https://dashboard.heroku.com/account/applications
新しく認証用APITokenを作成

```
HEROKU_OAUTH_ID=a43bbce3-6106-4f40-a43d-81aa96458c40
HEROKU_OAUTH_SECRET=40543f22-535b-44aa-b248-bf10fcad33d2
```
herokuクライアントを使用し、tokenを取得する

`heroku auth:token`


先程取得したtokenを　.env　ファイルに追記

```
HEROKU_API_KEYS=************
```

`php artisan serve`

