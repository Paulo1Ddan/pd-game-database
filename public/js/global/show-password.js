$('#show_password').on('click', function(){
    var show_pass = document.getElementById('password');

    if(show_pass.type === 'password'){
        show_pass.type = 'text';
    }else{
        show_pass.type = 'password';
    }

});

