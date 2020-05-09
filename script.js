$(function() {
    load();

    $.get('getNbMsg.php', {'status': 'A_VALIDER'}, function(nb) {
            $('#nbMsgToValidate').html(nb);
    });
})

$('#submitInsert').click(function(e){
    e.preventDefault();

    let message = encodeURIComponent( $('#message').val() );

    if (message != "") {
        let data = "message=" + message + "&pseudo=" + $('#pseudo').text();
        $.post('insert.php', data, function(load) {
            if (load) {
                $.get('load.php', function(html) {
                    $('#messages').html(html);
                });
            }
        })
    }
});

function load() {
    setTimeout(function() {
        $.get('load.php', function(html) {
            $('#messages').html(html);
        });
        load();
    }, 10000);
}

function displayMsgToValidate($btn) {
    $.get('load.php', {'status': 'A_VALIDER'}, function(html) {
        $('#messages').html(html);
        $btn.addClass('d-none');
        $('#btnMsgValidated').removeClass('d-none');
    });
}

function displayMsgValidated($btn) {
    $.get('load.php', {'status': 'VALIDE'}, function(html) {
        $('#messages').html(html);
        $btn.addClass('d-none');
        $('#btnMsgToValidate').removeClass('d-none');
    });
}

function moderateMsg($btn, isValidated) {
    let status = isValidated ? 'VALIDE' : 'REFUSE';
    let $divBtn = $btn.closest('div');
    let $post = $divBtn.prev('.post');
    let id = $post.attr('id');
    $.post('update.php', {'id': id, 'status': status}, function() {
       $post.remove();
       $divBtn.remove();
    });
}