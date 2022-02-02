//フォーカスが外れるイベントが発生した際に関数の実行
$(function(){
    //blur = フォーカスが外れたかどうかを確認するための要素
    $("#email").bind("blur", function() {
        var _email = $(this).val();
        check_email(_email);
    });
});

function check_email(str) {
    $("#err_textbox p").remove();
    var _result = true;
    //trim = 文字列前後の余白を削除
    var _email = $.trim(str);

    if(!_email.match(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i)) {
        $("#err_textbox").append("<p><i class=\"fa fa-exclamation-triangle\"></i>メールアドレスを正確に入力してください。</p>");
        _result = false;
    }else if(_email.length > 30) {
        $("#err_textbox").append("<p><i class=\"fa fa-exclamation-triangle\"></i>メールアドレスが長すぎます。</p>");
        _result = false;
    }
    return _result;
}

$(function() {
    $("#name").bind("blur", function() {
        var _name = $(this).val();
        check_name(_name);
    });
});

function check_name(str) {
    $("#err_namebox p").remove();
    var _result = true;
    var _name = $.trim(str);

    if(_name == '') {
        $("#err_namebox").append("<p><i class=\"fa fa-exclamation-triangle\"></i> お名前を入力してください。 </p>");
        _result = false;
    }
    else if(_name.length > 12) {
        $("#err_namebox").append("<p><i class=\"fa fa-exclamation-triangle\"></i> お名前を12文字以内で入力してください。 </p>");
        _result = false;
    }
    return _result;
}

$(function() {
    $("#postal").bind("blur", function() {
        var _postal = $(this).val();
        check_postal(_postal);
    });
});

function check_postal(str) {
    $("#err_postal p").remove();
    var _result = true;
    var _postal = $.trim(str);

    if(!_postal.match(/^[0-9]{3}-?[0-9]{4}$/)) {
        $("#err_postal").append("<p><i class=\"fa fa-exclamation-triangle\"></i> 郵便番号を正確に入力してください。 </p>");
        _result = false;
    }
    return _result;
}

$(function() {
    $("#tel").bind("blur", function() {
        var _tel = $(this).val();
        check_tel(_tel);
    });
});

function check_tel(str) {
    $("#err_tel p").remove();
    var _result = true;
    var _tel = $.trim(str);

    if(_tel == '') {
        $("#err_tel").append("<p><i class=\"fa fa-exclamation-triangle\"></i> 電話番号を入力してください。 </p>");
        _result = false;
    }
    else if(!_tel.match(/^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/)) {
        $("#err_tel").append("<p><i class=\"fa fa-exclamation-triangle\"></i> 電話番号を正確に入力してください。 </p>");
        _result = false;
    }
    return _result;
}

