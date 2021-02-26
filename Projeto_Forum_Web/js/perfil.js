var local = document.getElementById('perf');
if (!erro){
    local.innerHTML = `<h1>${nome}</h1><h5>E-mail: ${email} - ID: ${id} </h5> <br><br><br>` 
}
else {
    local.style.color = "red";
}    