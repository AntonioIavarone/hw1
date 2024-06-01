
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

    var inputElement = document.getElementById('contenuto_barra');

    var userInput = inputElement.value;

    console.log(userInput);

    const apiUrl = 'api/prodotti_ricerca.php';

    fetch(apiUrl, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json' 
        },
        body: JSON.stringify({ searchTerm: userInput }) 
    })
    .then(onResponse)
    .then(onJson)
    .catch(error => {
        console.error('Errore nella ricerca:', error);
    });


    function onResponse (response){
        return response.json();
    }

    function onJson(json){
        {

            const listaProdotti = document.getElementById('lista');
            json.forEach(prodotto => {
    
            const div = document.createElement('div');
            div.className='prodotto';
    
            const imgElement = document.createElement('img');
            imgElement.src = 'data:image/jpeg;base64,' + prodotto.immagine_base64;
            div.appendChild(imgElement);
    
            const nome= document.createElement('a');
            nome.href=`../homeworkv2/prodotti/${prodotto.link}?id=${prodotto.id}&prezzo=${prodotto.prezzo}`;
            nome.innerText=`${prodotto.nome}`
            div.appendChild(nome);
    
            const prezzo= document.createElement('p');
            prezzo.innerText= `${prodotto.prezzo}€`;
            div.appendChild(prezzo);
    
            const desc= document.createElement('p');
            desc.innerText=`${prodotto.descrizione}`;
            div.appendChild(desc);
    
            listaProdotti.appendChild(div);
                                    
            });
    
        }
    }


}





















CercaProdotti();

function riCercaProdotti(event) {
    event.preventDefault();
    console.log('bottone premuto');

    var inputElement = document.getElementById('contenuto_barra');

    var userInput = inputElement.value;

    console.log(userInput);

    const url = `mhw3_ricerca.php?nome=${encodeURIComponent(userInput)}`;
    window.location.href = url;
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', riCercaProdotti);
});