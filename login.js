function isEmail(event){

    if (form.email.value.includes('@') && form.email.value.includes('.')) {
        console.log('bene');
    } else {

        const container=document.querySelector('#bottone');
        container.innerHTML = " ";
        const testo=document.createElement('a');
        container.appendChild(testo);
        testo.textContent='L Email inserita non esiste, si prega di usare una mail esistente ';

        event.preventDefault();
    }
}

const form = document.forms['login'];
form.addEventListener('submit',isEmail);