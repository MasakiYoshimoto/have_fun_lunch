//HTML読み込む準備できたよ
$(document).ready(function(){
$('.join_button').on('click',function(){
    //var dbtype = {'dbtype' : $('#dbtype').val()};
    //console.log($('#dbtype').val());
    $.ajax({
      url:'../Lib/join.php',
      type:'post',
      //data: dbtype,
      dataType:'json',
      success:function(response){
          switch (response.result_code) {
          case 0:
            //完了時の処理
            var message = $('<p>').html(response.message).addClass('thanksjoinmessage');
            $('.join_button').after(message);
             $('.join_button').html("参加を取り消す");
            break;
          case 1:
            //定員オーバーの処理
            var message = $('<p>').html(response.message).addClass('limitovermessage');
            $('.join_button').after(message);
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
