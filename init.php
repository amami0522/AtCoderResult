<!--
    APIサーバから受け取ったjsonを各配列に格納
-->

<?php
    $username = "";                  //入力されたユーザ名
    if(!empty($_POST['username'])){
        $username = $_POST['username'];
    }

    $contestNum = 0;              //コンテスト数
    $RatedcontestNum = 0;         //Ratedコンテスト数
    $IsRated = array();           //コンテストがRatedかどうか
    $Place = array();             //コンテスト順位
    $OldRating = array();         //参加前のレート
    $NewRating = array();         //参加後のレート
    $RatingDifference = array();  //レート変化
    $Performance =  array();      //パフォーマンス
    $ContestScreenName = array(); //コンテストの略称
    $ContestName = array();       //コンテストの正式名称
    $ContestDate = array();       //コンテスト日程
    $currentRating = -1;          //ユーザーの現在のレーティング
    $ratingColor = '#232323';     //レートの色(デフォルトは黒)

    if($username != ""){
        //コンテスト情報の取得
        $url = "https://atcoder.jp/users/" . $username . "/history/json";
        $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        //連想配列に変換
        $tmp = json_decode($json, true);

        //最新の物が上に来るように反転
        $arr = array_reverse($tmp);

        //各要素を配列に格納
        foreach($arr as $content){
            $IsRated[] = $content['IsRated'];
            $Place[] = $content['Place'];
            $OldRating[] = $content['OldRating'];
            $NewRating[] = $content['NewRating'];
            $RatingDifference[] = $content['NewRating'] - $content['OldRating'];;
            $Performance[] = $content['Performance'];
            $ContestScreenName[] = $content['ContestScreenName'];
            $ContestName[] = $content['ContestName'];
            $ContestDate[] = $content['EndTime'];
            //コンテスト回数カウント
            $contestNum++;
            if($content['IsRated']){
                $RatedcontestNum++;
            }
        }
    }
?>