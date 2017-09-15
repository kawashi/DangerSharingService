# DangerSharingService

災害情報共有サービス

# 設定すること

Twitterのaccess_tokenとかをサーバ変数に設定しておく。  
値はDSSのSlack参照。

# RestControllerの作り方

https://gist.github.com/Leko/7645597 を参考にする。

例: Controller_Api_Home を作る場合

```
php oil r rest home --format=json
```
