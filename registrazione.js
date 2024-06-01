function isEmail(event){
    if (form.email.value.includes('@') && form.email.value.includes('.')) {
        
        var email = form.email.value;
        var atPosition = email.indexOf('@');
        var dotPosition = email.lastIndexOf('.');

        if (atPosition < dotPosition) {
            console.log("buona email");
            isPassword(event); 
        } else {
            console.log("cattiva email");
            const container=document.querySelector('#bottone');
            container.innerHTML = " ";
            const testo=document.createElement('a');
            container.appendChild(testo);
            testo.textContent='Si prega di inserire un indirizzo email valido';
            event.preventDefault();
        }

    } else {
        console.log("cattiva email");
        
        const container=document.querySelector('#bottone');
        container.innerHTML = " ";
        const testo=document.createElement('a');
        container.appendChild(testo);
        testo.textContent='Email non valida, si prega di inserire un indirizzo email valido ';

        event.preventDefault();
    }
}

function isPassword(event){
    if (form.psw.value.length >= 7 && /[A-Z]/.test(form.psw.value) && /\d/.test(form.psw.value)) {
        console.log("buona password");
        equalPswToCpsw(event);
    } else {
        console.log("cattiva password");

        const container=document.querySelector('#bottone');
        container.innerHTML = " ";
        const testo=document.createElement('a');
        container.appendChild(testo);
        testo.textContent='Password non valida, deve avere lunghezza minima di 7 caratteri con almeno una maiuscola e un numero';

        event.preventDefault();
    }
}

function equalPswToCpsw(event){
    if(form.psw.value==form.cpsw.value){
        console.log("le password coincidono");
    }else{
        console.log("le password non coincidono");

        const container=document.querySelector('#bottone');
        container.innerHTML = " ";
        const testo=document.createElement('a');
        container.appendChild(testo);
        testo.textContent='La password non corrisponde a quella scritta precedentemente';

        event.preventDefault();
    }
}

const form = document.forms['registrazione'];
form.addEventListener('submit',isEmail);