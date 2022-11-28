liste = document.cookie
if (liste.length!==0)montab = JSON.parse(liste)
else montab =Array()
console.log(montab)

var panier =0
montab.forEach(element => { panier+= element.quantite })

document.getElementById('panier').innerHTML=panier