let citasMusicos = [
    {
        cita: "La música pot canviar el món perquè pot canviar les persones.",
        autor: "Bono"
    },
    {
        cita: "La música és la veritable respiració de la humanitat.",
        autor: "Rabindranath Tagore"
    },
    {
        cita: "La música és per a l'ànima el que la gimnàstica per al cos.",
        autor: "Plató"
    },
    {
        cita: "La música expressa allò que les paraules no poden dir i no pot quedar en silenci.",
        autor: "Victor Hugo"
    },
    {
        cita: "Sense música, la vida seria un error.",
        autor: "Friedrich Nietzsche"
    },
    {
        cita: "La música és l'art més directe; entra per l'orella i va al cor.",
        autor: "Magdalena Martínez"
    },
    {
        cita: "La música és l'idioma de l'ànima.",
        autor: "Kahlil Gibran"
    },
    {
        cita: "La música és l'art de combinar els sons de manera harmoniosa.",
        autor: "Manuel de Falla"
    },
    {
        cita: "La música és l'única medicina sense efectes secundaris.",
        autor: "Bobby Hutcherson"
    },
    {
        cita: "La música és la meva religió.",
        autor: "Jimi Hendrix"
    },
    {
        cita: "La música és l'arma més poderosa en la lluita per la justícia.",
        autor: "Bob Marley"
    },
    {
        cita: "La música és el refugi de l'ànima, la gran oradora de l'ànima.",
        autor: "Ralph Waldo Emerson"
    },
    {
        cita: "La música és l'art de combinar els sons de manera harmoniosa.",
        autor: "Manuel de Falla"
    },
    {
        cita: "La música és l'arma més poderosa en la lluita per la justícia.",
        autor: "Bob Marley"
    },
    {
        cita: "La música és la clau que obre les portes del cor.",
        autor: "Maria Augusta von Trapp"
    },
    {
        cita: "La música és el vi que omple la copa del silenci.",
        autor: "Robert Fripp"
    },
    {
        cita: "La música és la medicina de l'ànima.",
        autor: "John Logan"
    },
    {
        cita: "La música pot canviar el món perquè pot canviar les persones.",
        autor: "Bono"
    },
    {
        cita: "La música és el cor de la vida. Per ella parla l'amor; sense ella no hi ha bé possible i amb ella tot és bell.",
        autor: "Franz Liszt"
    },
    {
        cita: "La música és l'art de combinar els sons de manera harmoniosa.",
        autor: "Manuel de Falla"
    }
];

function mostrarCitaAleatoria() {
    // Obtener un índice aleatorio
    let indiceAleatorio = Math.floor(Math.random() * citasMusicos.length);

    // Seleccionar la cita y el autor
    let citaSeleccionada = citasMusicos[indiceAleatorio].cita;
    let autorSeleccionado = citasMusicos[indiceAleatorio].autor;

    // Construir el contenido usando backquote (`) y elementos HTML
    let contenidoHTML = `
                <p>${citaSeleccionada}</p>
                <cite>${autorSeleccionado}</cite>
            `;

    // Mostrar el contenido en un elemento con el id "cita-container" (ajusta el id según tus necesidades)
    document.getElementById('citas-blockquote').innerHTML = contenidoHTML;
}
mostrarCitaAleatoria()
/*
let imagenes = [
    '/assets/img/home/hero1.min.jpeg',
    '/assets/img/home/hero2.min.jpeg',
    '/assets/img/home/hero3.min.jpeg',
    '/assets/img/home/hero4.min.jpeg',
    '/assets/img/home/hero5.min.jpeg',
    '/assets/img/home/hero6.min.jpeg',
    '/assets/img/home/hero7.min.jpeg',
];

// Función para obtener un índice aleatorio
function obtenerIndiceAleatorio2(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Obtener un índice aleatorio
let indiceAleatorio2 = obtenerIndiceAleatorio2(0, imagenes.length - 1);

// Seleccionar una imagen aleatoria
let imagenAleatoria = imagenes[indiceAleatorio2];

// Mostrar la imagen en el elemento 'hero'
document.getElementById('hero').style.backgroundImage = `url('${imagenAleatoria}')`;
*/
let imagenes = [
    '/assets/img/home/hero1.min.jpeg',
    '/assets/img/home/hero2.min.jpeg',
    '/assets/img/home/hero3.min.jpeg',
    '/assets/img/home/hero4.min.jpeg',
    '/assets/img/home/hero5.min.jpeg',
    '/assets/img/home/hero6.min.jpeg',
    '/assets/img/home/hero7.min.jpeg',
];

// Función para obtener un índice aleatorio
function obtenerIndiceAleatorio2(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Obtener un índice aleatorio
let indiceAleatorio2 = obtenerIndiceAleatorio2(0, imagenes.length - 1);

// Seleccionar una imagen aleatoria
let imagenAleatoria = imagenes[indiceAleatorio2];

// Obtener el elemento 'hero'
let heroElement = document.getElementById('hero');

// Cargar la imagen en una nueva Image
let imagen = new Image();
imagen.src = imagenAleatoria;

// Cuando la imagen se haya cargado completamente, muestra la imagen con fade-in
imagen.onload = function () {
    heroElement.style.backgroundImage = `url('${imagenAleatoria}')`;
    heroElement.style.opacity = 1; // Cambia la opacidad a 1 para que aparezca con un fade-in
};



document.addEventListener('DOMContentLoaded', function () {
    var sections = document.querySelectorAll('.fade-in-section');

    function handleScroll() {
        sections.forEach(function (section) {
            if (isInViewport(section) && !section.classList.contains('visible')) {
                section.classList.add('visible');
            }
        });
    }

    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

        // Ajusta según el umbral que prefieras
        var threshold = 0.8;

        return (
            rect.bottom >= 0 &&
            rect.top <= viewHeight * threshold
        );
    }

    // Usa el evento scroll para dispositivos no táctiles y el evento touchmove para táctiles
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('touchmove', handleScroll);

    // Llama a la función para inicializar el estado al cargar la página
    handleScroll();
});