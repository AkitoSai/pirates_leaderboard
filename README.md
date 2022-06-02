# pirates_leaderboard
以 PHP + MySQL 架設於 GCP(Google Cloud Platform) 的Apache主機，提供 AkitosHome 中的打海賊遊戲的成績GET方式上傳用玩家名稱(name)以及得分(score)兩項數據，接收後連同Server端取得的日期時間(datetime)一起寫入leaderboard資料庫的pirates資料表

上傳是否成功會記錄在upload參數裡，連同取得pirates資料表中非數最高的前筆資料一起合併成JSON格式回傳

API 響應端口：  
http:derb

====================================  
Read Me  
Created by 蔡 易達 on 2022/6/2.  
Copyright © 2022年 蔡 易達. All rights reserved.
