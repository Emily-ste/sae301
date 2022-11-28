document.getElementById('ajout').addEventListener('click',function() {
    var id = document.getElementById('id').value
    var article= document.getElementById('article').innerHTML
    var prix= document.getElementById('prix').innerHTML

    index = montab.findIndex(element => element.id == id);
    if(index>-1){
        montab[index].quantite	= parseInt(montab[index].quantite) +parseInt(document.getElementById('qte').value);
        panier+=parseInt(document.getElementById('qte').value);
        document.getElementById('panier').innerHTML=panier;
    }
    else {
        montab.push({ 'id': id, 'article': article, 'quantite': document.getElementById('qte').value , 'prix': prix})
        panier+=parseInt(document.getElementById('qte').value);
        document.getElementById('panier').innerHTML=panier;
    }
    document.cookie = JSON.stringify(montab);
    console.log(montab);
})