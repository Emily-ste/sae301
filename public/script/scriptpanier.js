liste = document.cookie
if (liste!=="") {
    montab = JSON.parse(liste)
}
else {
    montab =Array()
}
console.log(montab)
document.getElementById('liste').value=JSON.stringify(montab);

var totalgeneral=0
montab.forEach(uneinfo => {
    html = `<tr id="${uneinfo.id}">
    <td>${uneinfo.article}</td>
    <td><button class="moins">-</button><span>${uneinfo.quantite}</span><button class="plus">+</button></td>
    <td ><span class="unitaire">${uneinfo.prix}</span>€</td>
    <td><span class="prix">${uneinfo.quantite * uneinfo.prix}</span>€</td>
    </tr>`;

    document.getElementById('zone').innerHTML += html
    totalgeneral += uneinfo.prix * uneinfo.quantite
})

document.getElementById('total').innerHTML = totalgeneral

document.querySelectorAll('.plus').forEach(clickplus)
function clickplus(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        qte++;
        this.parentNode.querySelector('span').innerHTML=qte;
        prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        total= prix*qte;
        totalgeneral += parseInt(prix)
        document.querySelector('#total').innerHTML=totalgeneral
        this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

        id = this.parentNode.parentNode.id; // recupere l'id de l'article cliqué
        index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
        montab[index].quantite	= parseInt(montab[index].quantite) +1; //incrementer la quantité
        document.cookie = JSON.stringify(montab);  // sauvegarde des infos dans le cookie "liste"
        document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire
    })
}
document.querySelectorAll('.moins').forEach(clickmoins)
function clickmoins(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        id = this.parentNode.parentNode.id; // recupere l'id de l'article cliqué
        prix = this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        if (qte <= 1) {
            document.getElementById(id).remove()

            totalgeneral -= parseInt(prix)
            document.querySelector('#total').innerHTML=totalgeneral
            this.parentNode.parentNode.querySelector('.prix').innerHTML=total;
            index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
            montab[index].quantite	= parseInt(montab[index].quantite) -1; //incrementer la quantité
            montab.splice(index, 1);
        } else {
            qte--;
            this.parentNode.querySelector('span').innerHTML = qte;
            total= prix*qte;
            totalgeneral -= parseInt(prix)
            document.querySelector('#total').innerHTML=totalgeneral
            this.parentNode.parentNode.querySelector('.prix').innerHTML=total;
            index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
            montab[index].quantite	= parseInt(montab[index].quantite) -1; //incrementer la quantité
        }

        document.cookie = JSON.stringify(montab);  // sauvegarde des infos dans le cookie "liste"
        document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire
    })
}