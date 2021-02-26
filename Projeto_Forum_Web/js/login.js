var email = document.getElementById('email');
var senha = document.getElementById('senha');
var botao = document.getElementById('login_botao');
email.onblur = function(){
    console.log(email.value);
    if (checarEmail()){
        document.getElementById('imagem_erro').src = 'https://image.flaticon.com/icons/svg/1828/1828643.svg';
        document.getElementById('imagem_erro').title = 'Email válido';
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
    else{
        document.getElementById('imagem_erro').src = 'https://image.flaticon.com/icons/svg/594/594801.svg';
        erro=true;
        erro_mensagem = 'Por Favor, digite um endereço de E-mail válido.';
        document.getElementById('imagem_erro').title = 'Por Favor, digite um endereço de E-mail válido.';
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    if (email.value == "")
        document.getElementById('imagem_erro').src="";
        document.getElementById('imagem_erro').title="";
        botao.type = 'button';
        botao.className = 'btn btn-primary btn-block';
        erro = true;
};
    senha.onblur = function(){
    if (senha.value == ""){
        erro = true;
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    else{
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
}

    document.getElementById('olho').addEventListener('mousedown', function() {
        senha.type = 'text';
    });
    document.getElementById('olho').addEventListener('mouseup', function() {
        senha.type = 'password';
    });
    document.getElementById('olho').addEventListener('mousemove', function() {
        senha.type = 'password';
    });


function checarEmail(){
    if (email.value == "" || email.value.indexOf('@')==-1 || email.value.indexOf('.')==-1 ) return false;
    else return true;
    }
