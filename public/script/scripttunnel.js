document.getElementById('btn-cb').addEventListener('click', function () {
    document.getElementById('cb').classList.add('show');
    document.getElementById('paypal').classList.remove('show');
})
document.getElementById('btn-paypal').addEventListener('click', function () {
    document.getElementById('cb').classList.remove('show');
    document.getElementById('paypal').classList.add('show');
    var list = document.getElementsByClassName('paypal-avoid');
    for (var i = 0, len = list.length; i < len; i++) {
        list[i].value = '';
    }
})

function addEventListenersByClass(className, event, fn) {
    var list = document.getElementsByClassName(className);
    for (var i = 0, len = list.length; i < len; i++) {
        list[i].addEventListener(event, fn, false);
    }
}

addEventListenersByClass('valid', 'click', function () {
    if ( document.getElementById('btn-paypal').checked === true ) {
        var paiement = 5;
        console.log('paiement = 5');
    } else {
        var paiement = 9;
        console.log('paiement = 9');
    }

    var listb = document.getElementsByClassName('champ');
    var value = 0;
    for (var i = 0, len = listb.length; i < len; i++) {
        if (listb[i].value !== '' && listb[i].value !== ' ' && listb[i].value !== null) {
            value ++;
        } else {
            listb[i].classList.add('error');
        }
        console.log(value)
    }
    console.log(value)
    if (value == paiement) {
        console.log('check valide')
        console.log('suite')
        document.getElementById('popup').classList.add('show2');
        document.getElementById('veil').classList.add('show');
    } else {
        console.log('check refusé')
        window.alert('Veuillez remplir tous les champs');
    }
})

addEventListenersByClass('retour', 'click', function () {
    console.log('retour')
    document.getElementById('popup').classList.remove('show2');
    document.getElementById('veil').classList.remove('show');
})

addEventListenersByClass('champ', 'input', function () {
    this.classList.remove('error');
})