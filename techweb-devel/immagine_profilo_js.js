
const img = document.querySelector('#immagine_profilo_nuova');

const file = document.querySelector('#user_img');

file.addEventListener('change' , function(){
    const choosedfile = this.files[0];
    if (choosedfile){
        const reader = new FileReader();
        reader.addEventListener('load' , function(){
            img.setAttribute('src', reader.result);
        })
        reader.readAsDataURL(choosedfile);
    }
})