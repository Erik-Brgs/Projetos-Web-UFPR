var email1 = document.getElementById('email1');
var email2 = document.getElementById('email2');
var usuario = document.getElementById('nome');
var senha1 = document.getElementById('senha1');
var senha2 = document.getElementById('senha2');
var erro = false;
var botao = document.getElementById('botao_registro');

email1.onblur = function(){
    if (email1.value.indexOf('@')==-1 || email1.value.indexOf('.')==-1){
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail está inválido";
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    else{
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail válido";
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
    if (email1.value == ""){
        document.getElementById('imagem_erro_email1').src = "";
        document.getElementById('imagem_erro_email1').title = "";
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    if (email1.value != email2.value){
        document.getElementById('imagem_erro_email2').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email2').title = "E-mail são diferentes";
         
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail são diferentes";
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
        erro = true;
    }
    else{
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail válido";
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
}

email2.onblur = function(){
    if (email2.value.indexOf('@')==-1 || email2.value.indexOf('.')==-1){
        document.getElementById('imagem_erro_email2').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email2').title = "E-mail está inválido";
        erro = true;
        botao.className = 'btn btn-danger btn-block';
        botao.type = 'button';
    }
    else{
        document.getElementById('imagem_erro_email2').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_email2').title = "E-mail válido";
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
    if (email2.value == ""){
        document.getElementById('imagem_erro_email2').src = "";
        document.getElementById('imagem_erro_email2').title = "";
        erro = true;
        botao.className = 'btn btn-danger btn-block';
        botao.type = 'button';
    }
    if (email1.value != email2.value){
        document.getElementById('imagem_erro_email2').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email2').title = "E-mail são diferentes";
         
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail são diferentes";
        erro = true;
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }    else{
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail válido";
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
}

usuario.onblur = function(){
    if (email1.value != email2.value){
        document.getElementById('imagem_erro_email2').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email2').title = "E-mail são diferentes";
         
        document.getElementById('imagem_erro_email1').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_email1').title = "E-mail são diferentes";
        erro = true;
        botao.className = 'btn btn-danger btn-block';
        botao.type = 'button';
    }
    if ((usuario.value.length > 4 && usuario.value.length < 20) && !usuario.value[0].match(/[^a-zà-ú]/gi)){
        document.getElementById('imagem_erro_usuario').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_usuario').title = "Nome válido";  
        erro = true;
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
    else{
        document.getElementById('imagem_erro_usuario').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_usuario').title = "E-mail está inválido";
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    
}

senha1.onblur = function(){
    if (senha1.value != senha2.value || senha1.value=="" || senha1.value.length < 8){
        document.getElementById('imagem_erro_senha1').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_senha2').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    else{
        document.getElementById('imagem_erro_senha1').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_senha2').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }

}

senha2.onblur = function(){
    if (senha1.value != senha2.value || senha2.value=="" ||senha2.value.length < 8){
        document.getElementById('imagem_erro_senha1').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        document.getElementById('imagem_erro_senha2').src = "https://image.flaticon.com/icons/svg/594/594801.svg";
        botao.type = 'button';
        botao.className = 'btn btn-danger btn-block';
    }
    else{
        document.getElementById('imagem_erro_senha1').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        document.getElementById('imagem_erro_senha2').src = "https://image.flaticon.com/icons/svg/1828/1828643.svg";
        botao.type = 'submit';
        botao.className = 'btn btn-success btn-block';
    }
}
if (erro){
    console.log ('algum dado está incorreto.')
}  
