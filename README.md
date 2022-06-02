# pirates_leaderboard
以 PHP + MySQL 架設於 GCP(Google Cloud Platform) 的Apache主機，提供 AkitosHome 程式中的打海賊遊戲的成績以 GET 方式上傳玩家名稱(name)以及得分(score)兩項數據，接收後連同 Server 端取得的日期時間(datetime)一起寫入 leaderboard 資料庫的 pirates 資料表。

上傳是否成功會記錄在 upload 參數裡，連同取得 pirates 資料表中分數最高的前50筆資料一起合併成JSON格式回傳。

API 響應端口：  
http://34.84.150.189/pirates_leaderboard/get.php  

====================================  
Read Me  
Created by 蔡 易達 on 2022/6/2.  
Copyright © 2022年 蔡 易達. All rights reserved.
