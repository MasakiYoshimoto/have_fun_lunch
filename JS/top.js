//HTML読み込む準備できたよ
$(document).ready(function(){
$('.join_button').on('click',function(){
    var dbtype = $('#dbtype').val();
    $.ajax({
      url:'../Lib/join.php',
      type:'post',
      data: {'dbtype':dbtype},
      dataType:'json',
      success:function(response){
          switch (response.result_code) {
            case 0:
            //完了時の処理
              var message = $('<p>').html(response.message).addClass('thanksjoinmessage');
              $('.results_msg').html(message);
              if(dbtype==1){
                $('.join_button').html("参加を取り消す");
                $('#dbtype').val(0);
              }else{
                $('.join_button').html("参加を希望する");
                $('#dbtype').val(1);
              }
            break;
            case 1:
            //定員オーバーの処理
              var message = $('<p>').html(response.message).addClass('limitovermessage');
                $('.results_msg').html(message);
            break;
            default:
            //その他の処理
                $('.results_msg').html('原因不明のエラーが発生しました。管理者へご連絡ください。');
            break;
        }
      },
        error:function(XMLHttpRequest, textStatus, errorThrown){
        alert('Error : ' + errorThrown);
      }
    });
  });
});
