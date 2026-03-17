# TravelSpots
オススメのスポットを共有するサイトです。
自分のオススメの場所をマップ上で共有して色々な人に共有できます。
<img width="1680" height="962" alt="Image" src="https://github.com/user-attachments/assets/fd7aab9b-eb54-48f1-9270-a53d14511436" />

## URL
画面中央のログインボタンからメールアドレスとパスワードを入力してログインできます。  
後ほど挿入

## メイン画面
<img width="1680" height="962" alt="Image" src="https://github.com/user-attachments/assets/a0abbd18-a75d-4180-a858-8b207969f4ba" />

## 操作方法

#### 投稿方法
検索窓からオススメのスポットを検索すると、投稿ボタンが表示されます。  
ボタンを押すと投稿画面に遷移します。投稿画面から必須事項を入力すると投稿が完了します。

#### 閲覧方法
既存のマーカーをクリックするとサイドバーから投稿内容が表示されます。  
さらにサイドバーをクリックすると単体投稿画面に遷移します。

## 使用技術
- PHP 8.4.17
- Laravel 12.40.2
- PostgreSQL 17.7
- node.js 22.22.0
- Docker/Docker-compose
- Google Maps API
- tailwindcss

## 機能一覧
- ユーザー登録、ログイン機能(Breeze)
- googlemap表示画面
    - 位置情報検索機能(geocoder)
    - マーカー表示(marker)
    - マーカー吹き出し表示(infowindow)
