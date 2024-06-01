
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

function imgSx (event){
    const image = event.currentTarget;

    const prima_immagine= document.querySelector ('#banner');
    const seconda_immagine= document.querySelector ('#banner2');
    prima_immagine.classList.add('nascosto');
    seconda_immagine.classList.remove('nascosto');
}

const image = document.querySelector('#sinistra');
image.addEventListener('click', imgSx);

function imgDx(event){
    
    const image=event.currentTarget;

    const prima_immagine= document.querySelector ('#banner');
    const seconda_immagine= document.querySelector ('#banner2');
    prima_immagine.classList.remove('nascosto');
    seconda_immagine.classList.add('nascosto');
}

const image2 = document.querySelector ('#destra');
image2.addEventListener ('click',imgDx);


function change(event){
    const xbox=document.querySelector('#hover');
    xbox.src='immagini/windows-11.jpg';
}

const xbox=document.querySelector('#hover');
xbox.addEventListener ('mouseenter', change);

function revert(event){
    const xbox=document.querySelector('#hover');
    xbox.src='immagini/gldn-XSX-CP-Xbox-Series-X.png';
}

const xbox2=document.querySelector('#hover');
xbox2.addEventListener ('mouseleave', revert);


function newsletter(event){
    const button=event.currentTarget;
    button.removeEventListener('click',newsletter);

    button.classList.add('nascosto');

    const input=document.createElement('input');
    const accetta=document.createElement('button');
    const testo=document.createElement('a');

    const container=document.querySelector('#buttons');

    container.appendChild(testo);
    container.appendChild(input);
    container.appendChild(accetta);
    
    accetta.classList.add('btn2');
    accetta.classList.add('accetta');
    accetta.textContent='CONFERMA';
    testo.textContent='Inserisci la tua email: ';
}

const button=document.querySelector('#iscrizione');
button.addEventListener('click',newsletter);

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