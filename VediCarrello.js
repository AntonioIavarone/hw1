const id = document.getElementById("idUtente").textContent;

console.log("ID dell'utente:", id);

var totale = 0;
var Num_articoli = 0;

fetch(`api/VediCarrello.php?id=${encodeURIComponent(id)}`)
.then(OnResponse)
.then(onJson)
.catch(error => {

    console.error('Si è verificato un errore durante la richiesta:', error);
    
    const tot = document.createElement('span');
    tot.innerText = `${totale}€ IVA inclusa`;
    tot.id = 'somma_finale';

    const somma = document.getElementById('totale');

    const span=document.createElement('span');
    span.className='info2';

    span.appendChild(tot)

    somma.appendChild(tot);

    const articoli=document.getElementById('articoli');

    const NArticoli=document.createElement('span');
    NArticoli.innerText=Num_articoli;

    articoli.appendChild(NArticoli)
})

function OnResponse (response){
    return response.json();
}

function onJson(json){
        const listaCarrello = document.getElementById('prodotto');
        json.forEach(prodotto => {

            const prod = document.createElement('div');
            prod.className = 'prodotti';

            const icon = document.createElement('div');
            icon.className = 'icona';

            const imgElement = document.createElement('img');
            imgElement.src = 'data:image/jpeg;base64,' + prodotto.immagine_base64;
            imgElement.className = 'image';

            const info = document.createElement('div');
            info.className = 'informazioni';

            const span = document.createElement('span');
            span.className = 'info2';

            const nome = document.createElement('a');
            nome.innerText = `${prodotto.nome}`;
            nome.href = `../homeworkv2/prodotti/${prodotto.link}?id=${prodotto.ID_prodotto}&prezzo=${prodotto.prezzo}`;
            const prezzo = document.createElement('a');
            prezzo.innerText = `${prodotto.prezzo}€`;

            const span2=document.createElement('span');

            const a=document.createElement('a');
            a.href=`Rimuovi_Carrello.php?id=${prodotto.ID_carrello}`;
            a.innerText='Rimuovi';

            totale += parseFloat(prodotto.prezzo);
            Num_articoli +=1;

            span.appendChild(nome)
            span.appendChild(prezzo)

            span2.appendChild(a)

            info.appendChild(span)
            info.appendChild(span2)

            prod.appendChild(icon);
            icon.appendChild(imgElement);
            prod.appendChild(info);

            listaCarrello.appendChild(prod);
        });

        const tot = document.createElement('span');
        tot.innerText = `${totale}€ IVA inclusa`;
        tot.id = 'somma_finale';
        
        const somma = document.getElementById('totale');

        const span=document.createElement('span');
        span.className='info2';

        const articoli=document.getElementById('articoli');

        const NArticoli=document.createElement('span');
        NArticoli.innerText=Num_articoli;

        articoli.appendChild(NArticoli)

        span.appendChild(tot)

        somma.appendChild(tot);

        console.log(totale);

}



function authorizeWithSquare(event) {
    window.location.href = 'paga_con_square.php?amount='+totale;
}

document.getElementById('Transazione').addEventListener('click', authorizeWithSquare);


function MostraBarra(event){
    const barra=event.currentTarget;

    const testa=document.querySelector('.testa');
    testa.classList.replace('testa','nascosto'); 
    const icone=document.querySelector('.icone');
    icone.classList.replace('icone','nascosto');

    const cerca=document.querySelector('#barra');
    cerca.classList.remove('nascosto');
}

const barra=document.querySelector('#cerca');
barra.addEventListener('click',MostraBarra);


function NascondiBarra(event){

    const testa=document.querySelector('.nascosto'); 
    testa.classList.replace('nascosto','testa'); 

    const icone=document.querySelector('.nascosto');
    icone.classList.replace('nascosto','icone');

    const cerca=document.querySelector('#barra');
    cerca.classList.add('nascosto');
}

const indietro=document.querySelector('#annulla');
indietro.addEventListener('click',NascondiBarra);

function CercaProdotti(event) {
    event.preventDefault();
    console.log('bottone premuto');

    var inputElement = document.getElementById('contenuto_barra');

    var userInput = inputElement.value;

    console.log(userInput);

    const url = `mhw3_ricerca.php?nome=${encodeURIComponent(userInput)}`;
    window.location.href = url;
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', CercaProdotti);
});