const liste = document.cookie
document.cookie = '[{"id":"101","article":"vis bois","quantite":2,"prix":"4"},{"id":"102","article":"boulon rond","quantite":3,"prix":"23"}]';


//get cookie
if (liste!==""){
    montab = JSON.parse(liste)
} else {
    montab = Array()
}


console.log(montab)


document.getElementsByClassName('liste').value=JSON.stringify(montab);

//afficher le panier
let totalgeneral=0
montab.forEach(props => {
    const tile = `<div class="produit" id="${props.id}">
        <img src="https://via.placeholder.com/150x150" alt="">
            <div class="produit--info">
                <div class="left">
                    <h2>${props.article}</h2>
                    <p>Le 12/07/23</p>
                </div>

                <div class="right">
                    <p><span class="unitaire">${props.prix}</span>€</p>
                    <div class="control">
                        <button class="moins">-</button>
                        <span>${props.quantite}</span>
                        <button class="plus">+</button>
                    </div>

                </div>
            </div>
    </div>`
    document.getElementsByClassName('zone').innerHTML += tile
    totalgeneral += props.prix * props.quantite
})

document.getElementsByClassName('total').innerHTML = totalgeneral


//ajouter un article
document.querySelectorAll('.plus').forEach(clickplus)


//article +1
function clickplus(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        qte++;
        this.parentNode.querySelector('span').innerHTML=qte;

        //update prix total article
        const prix = this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        const total = prix*qte;
        this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

        //update cookie
        const id = this.parentNode.parentNode.id; // recupere l'id de l'article cliqué
        index = montab.findIndex(element => element.id === id); //trouver l'article dans la liste du panier
        montab[index].quantite	= parseInt(montab[index].quantite) +1; //incrementer la quantité
        document.cookie = JSON.stringify(montab);  // sauvegarde des infos dans le cookie "liste"
        document.getElementsByClassName('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire

        //update total
        totalgeneral += 1*prix
        document.querySelector('#total').innerHTML=totalgeneral
    })
}

//article -1
document.querySelectorAll('.moins').forEach(clickmoins)

function clickmoins(tag){
    tag.addEventListener('click',function() {

        //if qte =1 don't do anything

        if(this.parentNode.querySelector('span').innerHTML === "1"){
            //delete article
            this.parentNode.parentNode.remove()

        } else {
            qte=this.parentNode.querySelector('span').innerHTML;
            qte--;
            this.parentNode.querySelector('span').innerHTML=qte;

            //update prix total article
            const prix = this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
            const total = prix*qte;
            this.parentNode.parentNode.querySelector('.prix').innerHTML=total;

            //update cookie
            id = this.parentNode.parentNode.id; // recupere l'id de l'article cliqué
            index = montab.findIndex(element => element.id === id); //trouver l'article dans la liste du panier
            montab[index].quantite	= parseInt(montab[index].quantite) -1; //decrementer la quantité
            document.cookie = JSON.stringify(montab);  // sauvegarde des infos dans le cookie "liste"
            document.getElementsByClassName('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire

            //update total
            totalgeneral -= 1*prix
            document.querySelector('#total').innerHTML=totalgeneral
        }
    })
}

