# HerokuQuickAccess

## 構築方法

````
$ composer install
$ npm i
$ npm run watch
````
herokuクライアントを使用し、tokenを取得する

`heroku auth:token`


先程取得したtokenを　.env　ファイルに追記

```
HEROKU_API_KEYS=************
```

`php artisan serve`
