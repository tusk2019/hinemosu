<?php
    header('Content-type: text/plain; charset= UTF-8');
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        // タイムゾーン設定
        date_default_timezone_set('Asia/Tokyo');

        // 変数の初期化
        $now_date = null;
        $file_handle = null;
        $success_message = null;
        $error_message = array();
        $mysqli = new mysqli( 'mysql141.phy.lolipop.lan', 'LAA1144163', 'mihara333', 'LAA1144163-hinemosu1');

        // 接続エラーの確認
        if( $mysqli->connect_errno ) {
            $error_message[] = '書き込みに失敗しました。 エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
        } else {
            // 文字コード設定
                    $mysqli->set_charset('utf8');
                    
                    // 書き込み日時を取得
                    $now_date = date("Y-m-d H:i:s");
                    
                    // データを登録するSQL作成
                    $sql = "INSERT INTO contact (time, name, email, message) VALUES ('$now_date', '$name', '$email', '$message')";
                    
                    // データを登録
                    $res = $mysqli->query($sql);
                
                    /*if( $res ) {
                        $success_message = 'メッセージを書き込みました。';
                    } else {
                        $error_message[] = '書き込みに失敗しました。';
                    }*/
                
                    // データベースの接続を閉じる
                    $mysqli->close();
        }

        echo '送信が完了いたしました。';
    }else{
        echo 'FAIL TO AJAX REQUEST';
    }
?>