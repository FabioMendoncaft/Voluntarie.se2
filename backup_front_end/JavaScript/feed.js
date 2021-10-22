function leiaMais(){
    var pontos         = document.getElementById("nada");
    var maisComentario = document.getElementById("mais");
    var btnComentario  = document.getElementById("btnComentario");

    if(pontos.style.display === "none"){
        pontos.style.display         = "inline";
        maisComentario.style.display = "none";
        btnComentario.innerHTML      = "Mostrar Comentários"
    }else{
        pontos.style.display         = "none";
        maisComentario.style.display = "inline";
        btnComentario.innerHTML      = "Ocutar Comentários"
    }
}