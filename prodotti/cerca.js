
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

    const url = `../mhw3_ricerca.php?nome=${encodeURIComponent(userInput)}`;
    window.location.href = url;
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', CercaProdotti);
});