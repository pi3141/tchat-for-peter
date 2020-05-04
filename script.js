$(function() {
    load();
})

$('#submit').click(function(e){
    e.preventDefault();

    let message = encodeURIComponent( $('#message').val() );

    if (message != "") {
        let data = "message=" + message + "&pseudo=" + $('#pseudo').text();
        $.post('action.php', data, function(html) {
            $('#messages').prepend(html);
        })
    }
});

function load() {
    // setTimeout(function() {
    //     let lastId = $('#messages p:first').attr('id');
    //
    //     $.get('load.php', {id: lastId}, function(html) {
    //         console.log(html);
    //         $('#messages').prepend(html);
    //     });
    //
    //     load();
    // }, 10000);
}