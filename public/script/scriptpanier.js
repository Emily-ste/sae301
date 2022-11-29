//=============================================================================================
//(GENERAL)
document.cookie = '[{"id":"2","article":" Maneskin ","quantite":4,"prix":"55"},{"id":"1","article":" The pretty reckless ","quantite":2,"prix":"56"}]'

//On récupère les cookies pour les mettre dans le tableau JSON montab
liste = document.cookie
if (liste.length!==0) {
    montab = JSON.parse(liste)
    console.log('Panier rempli')
    console.log(montab)
}
else {
    montab =Array()
    console.log('panier vide')
}

//On marque combien de produits sont dans le panier (Header)
var panier =0
montab.forEach(element => { panier+= element.quantite })
document.getElementById('panier').innerHTML=panier

//=============================================================================================
//(ARTICLE)

if (document.getElementById('ajout') !== null) {
    document.getElementById('ajout').addEventListener('click', function () {
        var id = document.getElementById('id').value
        var article = document.getElementById('article').innerHTML
        var prix = document.getElementById('prix').innerHTML

        index = montab.findIndex(element => element.id == id);

        //Si l'article est déjà dans le panier, on incrémente la quantité
        if (index > -1) {
            montab[index].quantite = parseInt(montab[index].quantite) + parseInt(document.getElementById('qte').value);
            panier += parseInt(document.getElementById('qte').value);
            document.getElementById('panier').innerHTML = parseInt(panier);
        }
        //Sinon on ajoute l'article au panier
        else {
            montab.push({
                'id': id,
                'article': article,
                'quantite': parseInt(document.getElementById('qte').value),
                'prix': prix
            })
            panier += parseInt(document.getElementById('qte').value);
            document.getElementById('panier').innerHTML = parseInt(panier);
        }

        //On met à jour les cookies
        document.cookie = JSON.stringify(montab);
        console.log(montab);
    })
}
//=============================================================================================
//(PANIER)

if (document.getElementById('liste') !== null) {
    document.getElementById('liste').value = JSON.stringify(montab);
}

var totalgeneral=0
var nbtotal=0
montab.forEach(uneinfo => {
     //htmlA
    htmlA = `<div class="produit" id="${uneinfo.id}">
        <img src="https://via.placeholder.com/150x150" alt="">
            <div class="produit--info">
                <div class="left">
                    <h2>${uneinfo.article}</h2>
                    <p>Le XX/XX/XXXX</p>
                    <p>xxhxx</p>
                </div>

                <div class="right">
                    <p><span class="unitaire">${uneinfo.prix}</span>€</p>
                    <p style="position: absolute;display: none"><span class="prix">${uneinfo.quantite * uneinfo.prix}</span></p>
                    <div class="control">
                        <a class="moins">-</a>
                        <span>${uneinfo.quantite}</span>
                        <a class="plus">+</a>
                    </div>
                    <a href="#">Supprimer</a>
                </div>
            </div>
        </div>`;
    if (document.getElementById('zone') !== null) {
        document.getElementById('zone').innerHTML += htmlA
        console.log('zone ajoutée')
    }

     //htmlB
    htmlB = `<div class="entree" id="${uneinfo.id}b">
                <h4>${uneinfo.article}</h4>
                <p>Qté : <span id="${uneinfo.id}b-qte">${uneinfo.quantite}</span><br><span class="prix" id="${uneinfo.id}b-prix">${uneinfo.quantite * uneinfo.prix}</span>€</p>
            </div>`
    if (document.getElementById('recap') !== null) {
        document.getElementById('recap').innerHTML += htmlB
        console.log('recap ajoutée')
    }

    totalgeneral += uneinfo.prix * uneinfo.quantite
    nbtotal += uneinfo.quantite
})

 //htmlC
htmlC = `<div class="recap--entree">
                <p>Nombre d'article : <span id="nbtotal"></span></p>
                <p>Total : <span class="total" id="total">44</span>€</p>
            </div>`
if (document.getElementById('recap') !== null) {
    document.getElementById('recap').innerHTML += htmlC
    console.log('recap ajoutée')
}


 //Mettre à jour le prix total du panier
if (document.getElementById('total') !== null) {
    document.getElementById('total').innerHTML = totalgeneral
}
//Mettre à jour le nombre total de produits

if (document.getElementById('nbtotal') !== null) {
    document.getElementById('nbtotal').innerHTML = nbtotal
}

document.querySelectorAll('.plus').forEach(clickplus)
function clickplus(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        id = this.parentNode.parentNode.parentNode.parentNode.id
        qte++;
        this.parentNode.querySelector('span').innerHTML=qte;
        prix=this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        total= prix*qte;
        totalgeneral += parseInt(prix)
        nbtotal += 1
        document.querySelector('#total').innerHTML=totalgeneral
        document.querySelector('#nbtotal').innerHTML=nbtotal

         // recupere l'id de l'article cliqué

        index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
        montab[index].quantite = parseInt(montab[index].quantite) +1; //incrementer la quantité

        document.cookie = JSON.stringify(montab);  // sauvegarde des infos dans le cookie "liste"
        document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire

        document.getElementById(id+'b-qte').innerHTML = qte
        document.getElementById(id+"b-prix").innerHTML=total;
    })
}
document.querySelectorAll('.moins').forEach(clickmoins)
function clickmoins(tag){
    tag.addEventListener('click',function() {
        qte=this.parentNode.querySelector('span').innerHTML;
        id = this.parentNode.parentNode.parentNode.parentNode.id; // recupere l'id de l'article cliqué
        prix = this.parentNode.parentNode.querySelector('.unitaire').innerHTML;
        if (qte <= 1) {
            document.getElementById(id).remove()
            document.getElementById(id+'b').remove()

            totalgeneral -= parseInt(prix)
            nbtotal -= 1
            document.querySelector('#total').innerHTML=totalgeneral
            document.querySelector('#nbtotal').innerHTML=nbtotal
            index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
            montab.splice(index, 1);
        } else {
            qte--;
            this.parentNode.querySelector('span').innerHTML = qte;
            total= prix*qte;
            totalgeneral -= parseInt(prix)
            nbtotal -= 1
            document.querySelector('#total').innerHTML=totalgeneral
            document.querySelector('#nbtotal').innerHTML=nbtotal
            this.parentNode.parentNode.querySelector('.prix').innerHTML=total;
            index = montab.findIndex(element => element.id == id); //trouver l'article dans la liste du panier
            montab[index].quantite = parseInt(montab[index].quantite) -1; //incrementer la quantité

            document.getElementById(id+'b-qte').innerHTML = qte
            document.getElementById(id+"b-prix").innerHTML=total;
        }

        document.cookie = JSON.stringify(montab);  // sauvegarde des infos dans le cookie "liste"
        document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire
    })
}