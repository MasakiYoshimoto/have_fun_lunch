//HTML読み込む準備できたよ
$(document).ready(function(){
  $('.join_button').on('click',function(){
    $.ajax({
      url:'../Lib/join.php',
      type:'post',
      dataType:'html',
      success:function(response){
        console.log("0 : "+response[0]['result_code']);
        console.log("1 : "+response.result_code);
        console.log("2 : "+response[0]);
        switch (response[0]['result_code']) {
          case 0:
            //完了時の処理
            break;
          case 1:
            //定員オーバーの処理
            $('.join_button').after(response.message);
            break;
          default:
            //その他の処理
            $('.join_button').after('原因不明のエラーが発生しました。管理者へご連絡ください。');
            break;
        }
      }
    });
  });
});
