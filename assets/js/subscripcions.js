//Modelo de Datos
var data = {
    csrf_toke : null,
    subscripcion : {
        tarifa : null,
        correo : null,
        telefono : null,
        metodoPago : null,
        boletin : null
    },
    grupo : null,
    usuarios : {
        // Pila de objetos: 
        // 0 => "userData", 
        // 1 => "userData" 
        // ...
    },
    bigData : null
}

// Modelo de Usuario
var userData = {
    nombre : null,
    instrumento : null,
    foto : null,
    passaporte : null
}

class FormController{
    constructor(){
        this.submitElement = new SubmitElement(this);
        this.accordionPosition = 0;
        this.accordions = [];
        this.init();
    }
    init(){
        // Crear acordeones
        let accordions = document.getElementsByClassName('accordion-item');
        // Carga de formularios
        for(let i = 0; i < accordions.length; i++){
            this.accordions.push(new Accordion(this, accordions[i]))
            this.accordions[i].setForm(new forms[i](this.accordions[i]))
        }
    }
    next(action){
        if(action){
            if(this.accordionPosition < this.accordions.length - 1){
                this.accordionPosition++;
                this.accordions[this.accordionPosition].head.disabled = !action;
            }
        } 
        else{
            if(this.accordionPosition > 0){
                this.accordions[this.accordionPosition].head.disabled = !action;
                this.accordionPosition--;
            }
        }  
    }
}

class SubmitElement{
    constructor(controller){
        this.controller = controller;
        this.element = document.querySelector('button[type="submit"');
        this.loader = document.getElementById('submitLoader');
        this.handler = new HandleSubmit(this, controller)
        this.init();
    }
    init(){
        this.listener();
    }
    callback(e){
        e.preventDefault();
        this.handler.callback();
    }
    listener(){
        this.element.addEventListener('click', (e) => {this.callback(e)});
    }
}

class Accordion{
    constructor(controller, element){
        this.controller = controller;
        this.element = element;
        this.head = this.element.children[0].children[0];
        this.form = null;
        this.state = false;
    }
    click(){
        this.head.click();
    }
    valid(action){
        if(action)this.head.classList.add('validForm');
        else this.head.classList.remove('validForm');

        this.controller.next(action);
    }
    default(){
        this.head.classList.remove('validForm');
        this.controller.next(false);
    }
    setForm(form){
        this.form = form;
    }
}
// Componentes
class Wallet{
    constructor(controller){
        this.controller = controller;
        this.clients = [];
        this.container = document.getElementById('walletContainer');
    }
    init(clientObject){
        this.clients.push(clientObject);
        this.render(this.clients[this.clients.length -1].user_name);
    }
    callback(event){
        // Eliminar Item del wallet
        let id = event.target.id;
        let walletItem = document.getElementById(id)
        if (walletItem) {
          walletItem.parentNode.parentNode.removeChild(walletItem.parentNode);
        } 
        // Eliminar del objeto por Nombre
        let name = id.split('-')[1];
        this.update(name);

        // Analizar boton de añadir
        this.controller.addSwitch();

        // Evaluar formulario
        this.controller.callbackValidationData(null);
    }
    render(name){
        let id = `member-${name}`;
        let html = `
            <div class="walletItem">
                <span style="width: 90%;">${name}</span>
                <button id="${id}" type="button" class="btn-close" aria-label="Tancar"></button>
            </div>
        `;

        this.container.insertAdjacentHTML('beforeend', html);
        this.listener(id);
    }
    listener(elementId){
        document.getElementById(elementId).addEventListener('click', (e) => {this.callback(e)})

    }
    default(){
        this.clients = [];
        this.container.innerHTML = "";
    }
    update(userName) {
        // Actulizar wallet
        this.clients = this.clients.filter(objeto => objeto.user_name !== userName);
        // Actualizar controlador principal
        this.controller.value.miembros = this.controller.value.miembros.filter(objeto => objeto.user_name !== userName);
    }   

}

// Formilarios
class FormQuota{
    constructor(controller){
        this.controller = controller;
        this.inputs = document.querySelectorAll('input[name="user_share"');
        this.value = null;
        this.init();
    }
    init(){
        this.listener();
    }
    callback(inputIndex){
        // Asignar el valor seleccionado
        if(this.value == null){
            this.value = this.inputs[inputIndex].value;
            // Llmar al controlador
            this.controller.valid(true);
        }
        // Ejecutar setform del controlador dades personal para cambiar de formulario
        if(this.inputs[inputIndex].value == 'Grup'){
            //document.getElementById('multi-user').style.display = "block";
            //document.getElementById('single-user').style.display = "none";
            this.controller.controller.accordions[2].form.setForm(1);
        }else{
            //document.getElementById('multi-user').style.display = "none";
            //document.getElementById('single-user').style.display = "block";
            this.controller.controller.accordions[2].form.setForm(0);
        }
    }
    listener(){
        for(let i = 0; i < this.inputs.length; i++){
            this.inputs[i].addEventListener('change', () => {this.callback(i)});
        }
    }  
}

class FormInfoQuota{
    constructor(controller){
        this.controller = controller;
        this.inputs = [
            document.querySelector('input[name="sub_email"'),
            document.querySelector('input[name="sub_phone"'),
        ]
        this.value = {
            sub_email : null,
            sub_phone : null,
        };
        this.next = false;
        this.init();
    }
    init(){
        this.listener();
    }
    callback(inputIndex, inputvalue){
        // Si el input es el email
        if(inputIndex == 0){
            if(this.validarEmail(inputvalue)){
                // Si es correcto guardamo valor
                this.value.sub_email = inputvalue;
                this.renderValidation(inputIndex, true);
            }else{
                // Caso que no, borramos valor
                this.value.sub_email = null; 
                this.renderValidation(inputIndex, false);
            }
        }else if(inputIndex == 1){
            if(this.validarNumero(inputvalue)){
                // Si es correcto guardamo valor
                this.value.sub_phone = inputvalue;
                this.renderValidation(inputIndex, true);
            }else{
                // Caso que no, borramos valor
                this.value.sub_phone = null; 
                this.renderValidation(inputIndex, false);
            }
        }
        
        if(this.value.sub_email != null && this.value.sub_phone != null){
            if(!this.next){
                this.controller.valid(true);
                this.next = true;
            }
        }else{
            if(this.next){
                this.controller.default();
                this.next = false;
            }
        }
    }
    listener(){
        for(let i = 0; i < this.inputs.length; i++){
            this.inputs[i].addEventListener('keyup', () => {this.callback(i, this.inputs[i].value)});
        }
    }  
    renderValidation(inputIndex, action){
        if(action){
            this.inputs[inputIndex].classList.add('is-valid')
        }else{
            this.inputs[inputIndex].classList.remove('is-valid')
        }
    }
    validarEmail(email) {
    // Expresión regular para validar el formato de un email
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;   
    return regexEmail.test(email);
    }
    validarNumero(numeroTelefono) {
    // Expresión regular para buscar al menos 6 números en la cadena
    const regexNumeros = /\d/g;
    
    // Encuentra todos los dígitos en la cadena
    const numerosEncontrados = numeroTelefono.match(regexNumeros);
    
    // Verifica si hay al menos 6 números
    return numerosEncontrados && numerosEncontrados.length >= 6;
}
}

class FormDatosPersonales{
    constructor(controller){
        this.controller = controller;
        this.container = document.getElementById('userPersonalData')
        this.forms = [
            new SingleUser(this),
            new MultiUser(this)
        ]
        this.form = null;
        this.value = null;
        this.next = false;
    }
    callback(action){
        if(action){
            if(!this.next){
                this.controller.valid(true);
                this.next = true;
            }
        }else{
            if(this.next){
                this.controller.default();
                this.next = false;
            }
        }
    }
    setForm(indexForms){
        if(indexForms == 0){
            document.getElementById('multi-user').style.display = "none";
            document.getElementById('single-user').style.display = "block";
        }else if(indexForms == 1){
            document.getElementById('multi-user').style.display = "block";
            document.getElementById('single-user').style.display = "none";
        }

        try {
            this.form.default();
        } catch {
            
        }
        this.form = this.forms[indexForms];
    }
 
}

class SingleUser{
    constructor(controller, inputs = [
            document.querySelector('input[name="user_name"'),
            document.querySelector('input[name="user_instrument"'),
            document.querySelector('input[name="user_foto"'),
            document.querySelector('input[name="user_pasport"')
        ]){
            this.controller = controller;
        this.previewImages = [
            document.getElementById('previewFoto').src,
            document.getElementById('previewPasport').src
        ]
        this.inputs = inputs;
        this.value = {
            user_name : null,
            user_instrument : null,
            user_foto : null,
            user_pasport : null
        };
        this.init();
    }
    init(){
        this.listener();
    }
    callback(inputIndex){
        switch(inputIndex){
            // User Name
            case 0:
                if(this.validName(this.inputs[inputIndex].value))this.value.user_name = this.inputs[inputIndex].value, this.inputs[inputIndex].classList.add('is-valid');
                else this.value.user_name = null, this.inputs[inputIndex].classList.remove('is-valid');
                break;
            // Instrumento  
            case 1:
                if(this.validInstrument(this.inputs[inputIndex].value))this.value.user_instrument = this.inputs[inputIndex].value, this.inputs[inputIndex].classList.add('is-valid');
                else this.value.user_instrument = null, this.inputs[inputIndex].classList.remove('is-valid');
                break;
            // User Imagen  
            case 2:
                if(this.validImage(this.inputs[inputIndex]))this.value.user_foto = this.imageToData(this.inputs[inputIndex]), this.inputs[inputIndex].classList.add('is-valid');
                else this.value.user_foto = null, this.inputs[inputIndex].classList.remove('is-valid');
                break;
            // User Pasport  
            case 3:
                if(this.validImage(this.inputs[inputIndex]))this.value.user_pasport = this.imageToData(this.inputs[inputIndex]), this.inputs[inputIndex].classList.add('is-valid');
                else this.value.user_pasport = null, this.inputs[inputIndex].classList.remove('is-valid');
                break;
        }

        // Validar que todos los datos esten completados
        let isValid = this.verifyDataNulls(this.value);

        if(isValid){
            this.controller.callback(true);
        }else{
            this.controller.callback(false);
        }
    }
    listener(){
        for(let i = 0; i < this.inputs.length; i++){
            if(this.inputs[i].type == "file"){
                this.inputs[i].addEventListener('change', () => {this.callback(i)});
            }else{
                this.inputs[i].addEventListener('change', () => {this.callback(i)});
            }
        }
    } 
    validName(value) {
        // Utilizamos la función trim() para eliminar espacios en blanco al principio y al final
        value = value.trim();
        
        // Contamos la cantidad de espacios en blanco en la cadena
        var spaces = value.split(" ").length - 1;
        
        // La cadena contiene al menos dos palabras si hay al menos un espacio en blanco
        return spaces >= 1;
    }
    validInstrument(value){
        // Utilizamos la función trim() para eliminar espacios en blanco al principio y al final
        var response = value.trim();
    
        // Devolvemos true si la cadena no está vacía
        return response !== '';
    }
    validImage(inputFile){
        // Verificamos si hay archivos en el input
        return inputFile.files && inputFile.files.length > 0;
    }
    imageToData(inputFile){
        this.compressImageToBase64(inputFile, 0.7)
          .then((blob) => {
            // Almacena los datos de la imagen
            let imageData = blob;
            let key = inputFile.getAttribute("key");
            this.value[key] = imageData;
            this.callback(null);
          })
          .catch((error) => {
            console.error("Error:", error);
          });
    }
    verifyDataNulls(data) {
        for (const clave in data) {
            if (data.hasOwnProperty(clave)) {
                if (data[clave] === null) {
                    return false; 
                }
            }
        }
        return true; // Devuelve true si no hay ningún elemento con valor null
    }
    compressImageToBase64(imageInput, quality = 0.6) {
        return new Promise((resolve, reject) => {
            // Obtenemos el archivo de imagen del input
            const file = imageInput.files[0];

            if (!file) {
                reject(new Error("No se seleccionó ningún archivo."));
                return;
            }

            // Creamos un objeto FileReader para leer el archivo
            const reader = new FileReader();

            // Cuando el archivo se lea correctamente
            reader.onload = function(event) {
                // Creamos una imagen a partir del contenido leído
                const img = new Image();
                img.src = event.target.result;

                // Cuando la imagen se cargue
                img.onload = function() {
                    // Creamos un elemento canvas para dibujar la imagen
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');

                    // Redimensionamos la imagen si es necesario
                    let newWidth = img.width;
                    let newHeight = img.height;

                    // Si el ancho de la imagen es mayor que 500, redimensionamos
                    if (img.width > 500) {
                        const aspectRatio = img.height / img.width;
                        newWidth = 500;
                        newHeight = newWidth * aspectRatio;
                    }

                    // Ajustamos el tamaño del canvas a las dimensiones redimensionadas
                    canvas.width = newWidth;
                    canvas.height = newHeight;

                    // Dibujamos la imagen redimensionada en el canvas
                    context.drawImage(img, 0, 0, newWidth, newHeight);

                    // Comprimimos la imagen a base64 con la calidad especificada
                    const base64Data = canvas.toDataURL('image/jpeg', quality);

                    // Extraemos el tipo de imagen (ej: 'image/jpeg')
                    const tipo = file.type;
                    // Extraemos el nombre del archivo
                    const nombre = file.name;

                    // Devolvemos el objeto con las propiedades especificadas
                    resolve({
                        nombre: nombre,
                        tipo: tipo,
                        contenido: base64Data
                    });
                };

                // Manejar errores en la carga de la imagen
                img.onerror = function() {
                    reject(new Error("Error al cargar la imagen."));
                };
            };

            // Manejar errores en la lectura del archivo
            reader.onerror = function() {
                reject(new Error("Error al leer el archivo de imagen."));
            };

            // Iniciamos la lectura del archivo como una URL de datos
            reader.readAsDataURL(file);
        });
    }
    default(){
        for(let i = 0; i < this.inputs.length; i++){
            this.inputs[i].value = "";
            this.inputs[i].classList.remove('is-valid');
        }
        document.getElementById('previewFoto').src = this.previewImages[0];
        document.getElementById('previewPasport').src = this.previewImages[1];

        this.value = {
            user_name : null,
            user_instrument : null,
            user_foto : null,
            user_pasport : null
        };

        this.controller.callback(false);
    }
}

class MultiUser {
  constructor(controller) {
    this.controller = controller;
    this.wallet = new Wallet(this);
    this.addBtn = document.getElementById("addBtn");
    this.maxMembers = 6;
    this.value = {
      grupo_nombre: null,
      grupo_logo: null,
      miembros: [],
    };
    this.previewImages = [
      document.getElementById("previewFotoMember").src,
      document.getElementById("previewPasportMember").src,
    ];
    this.previewLogo = document.getElementById("previewLogo").src;
    this.closeBtn = [
      document.getElementById("closeModalMember"),
      document.getElementById("closeModalUp"),
    ];
    this.saveBtn = document.getElementById("saveModalMemder");
    this.inputsSingle = [
      document.querySelector('input[name="member_name"'),
      document.querySelector('input[name="member_instrument"'),
      document.querySelector('input[name="member_foto"'),
      document.querySelector('input[name="member_pasport"'),
    ];
    this.inputs = [
      document.getElementById("grupo_name"),
      document.getElementById("grupo_logo"),
    ];
    this.userFormController = new SingleUser(this, this.inputsSingle);
    this.init();
  }
  init() {
    this.listener();
  }
  callback(action) {
    if (action) this.saveBtn.disabled = false;
    else this.saveBtn.disabled = true;
  }
  callbackValidationData(inputIndex) {
    switch (inputIndex) {
      // Nombre Grupo
      case 0:
        if (this.inputs[inputIndex].value.length > 0)
          (this.value.grupo_nombre = this.inputs[inputIndex].value),
            this.inputs[inputIndex].classList.add("is-valid");
        else this.inputs[inputIndex].classList.remove("is-valid");
        break;
      // Imagen grupo
      case 1:
        if (this.userFormController.validImage(this.inputs[inputIndex]))
          (this.value.grupo_logo = this.imageToData(this.inputs[inputIndex])),
            this.inputs[inputIndex].classList.add("is-valid");
        else
          (this.value.user_foto = null),
            this.inputs[inputIndex].classList.remove("is-valid");
        break;
    }

    // Validar si el formulario esta completo
    if (
      this.value.grupo_nombre != null &&
      this.value.grupo_logo != null &&
      this.value.miembros.length > 0 &&
      this.value.miembros.length <= this.maxMembers
    ) {
      this.controller.callback(true);
    } else {
      this.controller.callback(false);
    }
  }
  callbackSave() {
    // Guardar en caso de que no cumpla el maximo de miembros
    if (this.value.miembros.length < this.maxMembers) {
      // Cargar un item en wallet
      this.wallet.init(this.userFormController.value);
      // Cargar item en value (this)
      this.value.miembros.push(this.userFormController.value);
      // Evaluar formulario
      this.callbackValidationData(null);
    } else {
      alert(
        "No es pot afegir més membre.Si està experimentant un error, si us plau refresqui la pàgina.Disculpi les molèsties."
      );
    }

    // Desactivar boton en el ultimo miembro
    this.addSwitch();

    // Cerrar Modal
    this.callbackClose();
    this.closeBtn[0].click();
  }
  addSwitch() {
    // Desactivar boton en el ultimo miembro
    if (this.value.miembros.length == this.maxMembers) {
      this.addBtn.disabled = true;
      this.addBtn.ariaDisabled = true;
    } else {
      this.addBtn.disabled = false;
      this.addBtn.ariaDisabled = false;
    }
  }
  callbackClose() {
    for (let i = 0; i < this.inputsSingle.length; i++) {
      this.inputsSingle[i].value = "";
      this.inputsSingle[i].classList.remove("is-valid");
    }
    document.getElementById("previewFotoMember").src = this.previewImages[0];
    document.getElementById("previewPasportMember").src = this.previewImages[1];
    this.userFormController.value = {
      user_name: null,
      user_instrument: null,
      user_foto: null,
      user_pasport: null,
    };
    this.saveBtn.disabled = true;
  }
  listener() {
    // Listener para botones de cierre del modal
    for (let i = 0; i < this.closeBtn.length; i++) {
      this.closeBtn[i].addEventListener("click", this.callbackClose.bind(this));
    }
    // Listener para boton de guardar del modal
    this.saveBtn.addEventListener("click", this.callbackSave.bind(this));
    // Listener para inputs fuera del modal
    for (let i = 0; i < this.inputs.length; i++) {
      if (this.inputs[i].type == "file")
        this.inputs[i].addEventListener("change", (e) => {
          this.callbackValidationData(i);
        });
      else
        this.inputs[i].addEventListener("keyup", (e) => {
          this.callbackValidationData(i);
        });
    }
  }
  default() {
    for (let i = 0; i < this.inputs.length; i++) {
      this.inputs[i].value = "";
      this.inputs[i].classList.remove("is-valid");
    }
    document.getElementById("previewLogo").src = this.previewLogo;

    this.wallet.default();
    this.callbackClose();
    this.value = {
      grupo_logo: null,
      grupo_nombre: null,
      miembros: [], //this.userFormController.value
    };

    this.addBtn.disabled = false;
    this.addBtn.ariaDisabled = false;
    this.controller.callback(false);
  }
  imageToData(inputFile) {
    this.compressImageToBase64(inputFile, 0.7)
      .then((blob) => {
        // Almacena los datos de la imagen
        let imageData = blob;
        let key = inputFile.getAttribute("key");
        console.log(key)
        this.value[key] = imageData;
        this.callback(true);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
  compressImageToBase64(imageInput, quality = 0.6) {
    return new Promise((resolve, reject) => {
      // Obtenemos el archivo de imagen del input
      const file = imageInput.files[0];

      if (!file) {
        reject(new Error("No se seleccionó ningún archivo."));
        return;
      }

      // Creamos un objeto FileReader para leer el archivo
      const reader = new FileReader();

      // Cuando el archivo se lea correctamente
      reader.onload = function (event) {
        // Creamos una imagen a partir del contenido leído
        const img = new Image();
        img.src = event.target.result;

        // Cuando la imagen se cargue
        img.onload = function () {
          // Creamos un elemento canvas para dibujar la imagen
          const canvas = document.createElement("canvas");
          const context = canvas.getContext("2d");

          // Redimensionamos la imagen si es necesario
          let newWidth = img.width;
          let newHeight = img.height;

          // Si el ancho de la imagen es mayor que 500, redimensionamos
          if (img.width > 500) {
            const aspectRatio = img.height / img.width;
            newWidth = 500;
            newHeight = newWidth * aspectRatio;
          }

          // Ajustamos el tamaño del canvas a las dimensiones redimensionadas
          canvas.width = newWidth;
          canvas.height = newHeight;

          // Dibujamos la imagen redimensionada en el canvas
          context.drawImage(img, 0, 0, newWidth, newHeight);

          // Comprimimos la imagen a base64 con la calidad especificada
          const base64Data = canvas.toDataURL("image/jpeg", quality);

          // Extraemos el tipo de imagen (ej: 'image/jpeg')
          const tipo = file.type;
          // Extraemos el nombre del archivo
          const nombre = file.name;

          // Devolvemos el objeto con las propiedades especificadas
          resolve({
            nombre: nombre,
            tipo: tipo,
            contenido: base64Data,
          });
        };

        // Manejar errores en la carga de la imagen
        img.onerror = function () {
          reject(new Error("Error al cargar la imagen."));
        };
      };

      // Manejar errores en la lectura del archivo
      reader.onerror = function () {
        reject(new Error("Error al leer el archivo de imagen."));
      };

      // Iniciamos la lectura del archivo como una URL de datos
      reader.readAsDataURL(file);
    });
  }
}

class FormBigData{
    constructor(controller){
        this.controller = controller;
        this.next = false;
        this.skipBtn = document.getElementById('btnSkip');
        this.inputs = [
            document.querySelector('input[name="bd-1"]'),
            document.querySelectorAll('input[name="bd-2"]'),
            document.querySelectorAll('input[name="bd-3"]'),
            document.querySelectorAll('input[name="bd-4"]'),
            document.querySelectorAll('input[name="bd-5"]'),
            document.querySelector('textarea[name="bd-6"]'),

        ];
        this.value = [
            {
                q : "Amb quin estil de música estàs més familiaritzat?",
                a : null
            },
            {
                q : "Has rebut beques o subvencions per financiar la teva professió musical?",
                a : null
            },
            {
                q : "Et dediques o t'has dedicat professionalment a la música?",
                a : null
            },
            {
                q : "Et resulta complicat trobar oportunitats laborals?",
                a : null
            },
            {
                q : "Quines estratègies utilitzes per a promocionar-te?",
                a : []
            },
            {
                q : "Tens algún projecte en aquest moment? Podríes descriure'l breument?",
                a : null
            }
        ]
        this.init();
    }
    init(){
        this.listener();
    }
    callback(){
        if(!this.next){
            this.controller.valid(true);
            this.next = true;
        }
    }
    skip(){
        document.getElementById('skipAction').click();
    }
    valid(inputIndex){
        //console.log(inputIndex)
    }
    getData(event){
        
        // Añadir estilo valido
        //let value = event.target.value;
        //if(event.target.type == "radio" || event.target.type == "checkbox"){
        //    if(value != null) event.target.classList.add('is-valid');
        //    else event.target.classList.remove('is-valid');
        //}else{
        //    if(value.length > 0) event.target.classList.add('is-valid');
        //    else event.target.classList.remove('is-valid');
        //}

        // Guardar informacion
        let question = event.target.name.split("-")[1] - 1
        if(question == 4){
            if(event.target.checked){
                this.value[question].a.push(event.target.value)
            }else{
                let indexToDelete = this.value[question].a.indexOf(event.target.value);
                if (indexToDelete !== -1) {
                    this.value[question].a.splice(indexToDelete, 1);
                }
            }
        }else{
            this.value[question].a = event.target.value;
        }
    }
    listener(){
        // Validar Automaticamente
        this.controller.head.addEventListener('click', this.callback.bind(this));
        // Boton de salto
        this.skipBtn.addEventListener('click', this.skip.bind(this));
        // Listeners
        // BD1
        this.inputs[0].addEventListener('keyup', (e) => this.getData(e));
        // BD2
        for(let i = 0; i < this.inputs[1].length; i++){
            this.inputs[1][i].addEventListener('change', (e) => this.getData(e));
        }
        // BD3
        for(let i = 0; i < this.inputs[2].length; i++){
            this.inputs[2][i].addEventListener('change', (e) => this.getData(e));
        }
        // BD4
        for(let i = 0; i < this.inputs[3].length; i++){
            this.inputs[3][i].addEventListener('change', (e) => this.getData(e));
        }
        // BD5
        for(let i = 0; i < this.inputs[4].length; i++){
            this.inputs[4][i].addEventListener('change', (e) => this.getData(e));
        }
        // BD6
        this.inputs[5].addEventListener('keyup', (e) => this.getData(e));
    }  
}

class FormPayment{
    constructor(controller){
        this.controller = controller;
        this.value = null;
        this.next = false;
        this.inputs = document.querySelectorAll('input[name="user_payment"]');
        this.init();
    }
    init(){
        this.listener();
    }
    callback(event){
        if(!this.next){
            this.value = event.target.value;
            this.next = true;
            this.controller.valid(true);
        }
    }
    listener(){
        for(let i = 0; i < this.inputs.length; i++){
            this.inputs[i].addEventListener('click', (e) => {this.callback(e)})
        }
    }
}

class FormPolicy{
    constructor(controller){
        this.controller = controller;
        this.inputs = [
            document.querySelector('input[name="policy"]'),
            document.querySelector('input[name="info"]'),
            document.querySelector('input[name="boletin"]')
        ]
        this.value = {
            bolleti : null,
            csrf_token : document.querySelector('input[name="csrf_token"]').value
        }
        this.init();
    }
    init(){
        this.listener();
    }
    callback(inputIndex){
        // Habilitar Submit
        if(this.inputs[0].checked && this.inputs[1].checked){
            this.controller.controller.submitElement.element.disabled = false;
            this.controller.valid(true);
        }else{
            this.controller.controller.submitElement.element.disabled = true;
        } 

        // Guardar datos
        if(this.inputs[2].checked) this.value.bolleti = true;
        else this.value.bolleti = false;
    }
    listener(){
        this.inputs[0].addEventListener('change', (e) => {this.callback(e)})
        this.inputs[1].addEventListener('change', (e) => {this.callback(e)})
        this.inputs[2].addEventListener('change', (e) => {this.callback(e)})
    }
}

// Sumit Handler
class HandleSubmit {
  constructor(controller, mainControler) {
    this.controller = mainControler;
    this.parentControler = controller;
    this.url = "https://musicsandorra.com/api/subscripcions.php";
    this.dataModel = {
      csrf_toke: null,
      subscripcion: {
        tarifa: null,
        correo: null,
        telefono: null,
        metodoPago: null,
        boletin: null,
      },
      grupo: null,
      usuarios: {
        // Pila de objetos:
        // 0 => "userData",
        // 1 => "userData"
        // ...
      },
      bigData: null,
    };
  }
  getData() {
    let data = {
      csrf_token: this.controller.accordions[5].form.value.csrf_token,
      subscripcion: {
        tarifa: this.controller.accordions[0].form.value,
        correo: this.controller.accordions[1].form.value.sub_email,
        telefono: this.controller.accordions[1].form.value.sub_phone,
        metodoPago: this.controller.accordions[4].form.value,
        boletin: this.controller.accordions[5].form.value.bolleti,
      },
      grupo: null,
      bigData: this.controller.accordions[3].form.value,
    };

    // Grupo & Mimembros
    if (this.controller?.accordions?.[2]?.form?.form?.wallet !== undefined) {
      // Grupo
      data["grupo"] = {
        nombre: this.controller.accordions[2].form.form.value.grupo_nombre,
        imagen: this.controller.accordions[2].form.form.value.grupo_logo,
      };
      // Miembro
      data["usuarios"] = this.controller.accordions[2].form.form.value.miembros;
    }
    // Usuario Individual
    else {
      data["usuarios"] = [this.controller.accordions[2].form.form.value];
    }

    return data;
  }
  async sendData(data) {
    try {
      const response = await fetch(this.url, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      if (!response.ok) {
        return {
          error: true,
          mensaje: new Error("Error al enviar la solicitud"),
        };
      }

      const responseData = await response.json();
      return responseData;
    } catch (error) {
        return { error: true, mensaje: error };
    }
  }
  renderLoad(state) {
    // Recibira un bool como parametro
    // true -> para estado Load
    if (state) {
      this.parentControler.element.style.display = "none";
      this.parentControler.loader.style.display = "block";
    } else {
      this.parentControler.element.style.display = "block";
      this.parentControler.loader.style.display = "none";
    }
  }
  renderResponse(response, account = null) {
    //console.log("Respuesta recivida desde el servidor:");
    //console.log(response);

    // Si es existossa
    if(!response.error){
        let form = document.getElementById("formulari-inscripcio");
        let toast = document.getElementById("responseSuccess");
        let message = document.getElementById("responseSuccesMessage");

        form.style.display = "none";
        message.textContent = account;
        toast.classList.add('show');
    }
    // Si falla
    else{
        let form = document.getElementById("formulari-inscripcio");
        let toast = document.getElementById("responseError");
        let message = document.getElementById("responseErrorMessage");
        message.textContent = response.mensaje;
        toast.classList.add('show');

    }
  }
  async callback() {
    // Renderizar spiner
    this.renderLoad(true);
    // Procesar datos
    let data = this.getData();
    //console.log("Se van a enviar estos datos:");
    console.log(data);
    // Enviar Datos
    let response = await this.sendData(data);
    // Deshabilitar spinner
    this.renderLoad(false);
    // Renderizar Respuesta
    this.renderResponse(response, data.subscripcion.correo);
  }
}


var forms = [
    FormQuota,
    FormInfoQuota,
    FormDatosPersonales,
    FormBigData,
    FormPayment,
    FormPolicy
]

let FormApp = new FormController();