function leiaMais(id){
    var id_acao = id;
    var pontos         = document.getElementById("nada"+id_acao);
    var maisComentario = document.getElementById("mais"+id_acao);
    var btnComentario  = document.getElementById("btnComentario"+id_acao);
    
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