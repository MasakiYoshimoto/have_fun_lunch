//HTML読み込む準備できたよ
$(document).ready(function(){
  $('.join_button').on('click',function(){
    $.ajax({
      url:'../Lib/join.php',
      type:'post',
      dataType:'html',
      success:function(response){
        switch (respomce) {
          case 0:
            //完了時の処理
            break;
          case 1:
            //定員オーバーの処理
            $('.join_button').after(respomce.message);
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
