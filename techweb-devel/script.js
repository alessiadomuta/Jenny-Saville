// Mostra o nascondi il menu mobile
function toggleMobileMenu(){
    document.querySelector("nav#menu").classList.toggle("show");
}


//mostra o nascondi le info sul prodotto acquistato
function toggleInfoAcquisto(id){
    var x = document.getElementById(id);
    if (x.className === "nascondi_ordine"){
        x.className = "mostra_ordine";
        } else {
            x.className = "nascondi_ordine";
        }
}

//funzioni per cambiare colore del prodotto
function changeMainImage(imagePath){
    image = document.getElementById("shirt-preview");
    if(image.src != imagePath){
        image.src = imagePath;
    }
}


//funzioni per il cambio delle stelle nel lasciare un recensioni
function fillStars(n){
    for(let i=1; i<=n; i++){
        let str = i.toString().concat('stelle');
        let stella = document.getElementById(str);
        stella.src = "images/Jenny Saville.png";
    }
}

function emptyStars(){
    for(let i=1; i<=5; i++){
        let str = i.toString().concat('stelle');
        let stella = document.getElementById(str);
        if (stella.className != "permaStar"){
            stella.src = "images/tazza.png";
        }
    }
}

function permaFillStars(n){
    for(let i=1; i<=n; i++){
        let str = i.toString().concat('stelle');
        let stella = document.getElementById(str);
        stella.src = "images/Jenny Saville.png";
        stella.className = "permaStar";
    }
    for(let i=5; i>n; i--){
        let str = i.toString().concat('stelle');
        let stella = document.getElementById(str);
        stella.src = "images/tazza.png";
        stella.className = "star";
    }
}

function changeQuantity($item){
    let form = document.getElementById("item-form-".concat($item));
    form.submit();
}
