/* ============= SLIDES ============= */

document.addEventListener("DOMContentLoaded", function() {
    let slideIndex = 1;
    let interval;

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slide");
        if (slides.length === 0) {
            return;
        }
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }

    function plusSlides(n) {
        clearInterval(interval); 
        showSlides(slideIndex += n);
        interval = setInterval(() => {
            plusSlides(1); 
        }, 4000);
    }

    showSlides(slideIndex);
    interval = setInterval(() => {
        plusSlides(1);
    }, 4000);
});

function plusSlides(n) {
    clearInterval(interval); 
    showSlides(slideIndex += n);
    interval = setInterval(() => {
        plusSlides(1); 
    }, 4000);
}


/* ============= ASIDE SLIDES ============= */

document.addEventListener("DOMContentLoaded", function() {
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var aside_slides = document.getElementsByClassName("aside-slide");
        for (i = 0; i < aside_slides.length; i++) {
            aside_slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > aside_slides.length) {slideIndex = 1}    
        aside_slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 2000); // Altere o tempo aqui se necessário
    }
});

/* Responsive menu boton */

function togglemenu(x) {
    x.classList.toggle("change");
}

/* tabs da página do usuário */

function trocarImagem(imagemPequena) {
    var mainImage = document.getElementById("main-image");
    mainImage.src = imagemPequena.src;
}

function mostrarAtributo(evt, atributo) {
    var i, product_tab_body, atributo_link;
    product_tab_body = document.getElementsByClassName("product_tab_body");
    for (i = 0; i < product_tab_body.length; i++) {
        product_tab_body[i].style.display = "none";
    }
    atributo_link = document.getElementsByClassName("atributo_link");
    for (i = 0; i < atributo_link.length; i++) {
        atributo_link[i].className = atributo_link[i].className.replace("active", "");
    }
    document.getElementById(atributo).style.display = "block";
    evt.currentTarget.className += " active";
}

/* tabs da página de produto */

function abrirDadosUsuario(evt, atributo) {
    var i, product_tab_body, user_data_link;
    product_tab_body = document.getElementsByClassName("user-card-data");
    for (i = 0; i < product_tab_body.length; i++) {
        product_tab_body[i].style.display = "none";
    }
    user_data_link = document.getElementsByClassName("user_data_link");
    for (i = 0; i < user_data_link.length; i++) {
        user_data_link[i].className = user_data_link[i].className.replace("active", "");
    }
    document.getElementById(atributo).style.display = "block";
    evt.currentTarget.className += " active";
}

/* TELA DE login */
    /* tela de cadastro */
document.addEventListener("DOMContentLoaded", function() {
    var modalLogin = document.getElementById('modal-login');
    var modalCadastro = document.getElementById('modal-cadastro');
    var modalToDo = document.getElementById('modal-to-do');
    var modalYmr = document.getElementById('modal-ymr');
    window.onclick = function(event) {
        if (event.target == modalLogin) {
            modalLogin.style.display = "none";
        }
        if (event.target == modalCadastro) {
            modalCadastro.style.display = "none";
        }
        if (event.target == modalToDo) {
            modalToDo.style.display = "none";
        }
        if (event.target == modalYmr) {
            modalYmr.style.display = "none";
        }
    }
});
