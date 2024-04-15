const credencialModal = document.getElementById("credencialModal");
const credencialData = document.getElementById("credencialData");

function domReady(fn) {
  if (
    document.readyState === "complete" ||
    document.readyState === "interactive"
  ) {
    setTimeout(fn, 1000);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}

domReady(function () {
  // If found you qr code
  function onScanSuccess(decodeText, decodeResult) {
    // Objeto JSON a enviar en la petición
    const data = {
      id: decodeText,
      csrf_token: null,
    };

    // Opciones para la petición Fetch
    const options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    };

    // URL de la API
    const url = "https://musicsandorra.com/api/soci.php";

    // Realizamos la petición Fetch
    fetch(url, options)
      .then((response) => {
        // Verificamos si la respuesta es exitosa (código 200)
        if (response.ok) {
          // Convertimos la respuesta a JSON
          return response.json();
        }
        // Si la respuesta no es exitosa, lanzamos un error
        throw new Error("Network response was not ok.");
      })
      .then((data) => {
        // Imprimimos la respuesta por consola
        console.log("Respuesta:", data);
        //window.location.href = `/credencial.php?data=${encodeURI(decodeText)}`;
        /*let message = data["error"]
          ? "Credencial invalida"
          : "Credencial valida";
        let classCSS = data["error"]
          ? "error"
          : "success";
        document.getElementById("log-message").innerHTML = `
        <div class="toast align-items-center show ${classCSS}" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              ${message}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
        `;*/
        if(data['error']){
          credencialData.innerHTML = "<h1 style='color: red';>Credencial invalida</h1>";
        }else{
          credencialData.innerHTML = `
            <!--Head -->
          <div class="row m-auto">
              <div class="col col-4">
                  <img class="img-fluid" src="/assets/img/asma-logo.min.png">
              </div>
              <div class="col col-8 d-flex justify-content-end align-items-center">
                  <h2 class="p-0 m-0" style="color: #cacaca;">Carnet de soci</h2>
              </div>
          </div>
          <!-- Profile -->
          <div class="text-center mb-3">
              <div class="imagen-usuario m-auto mt-5 mb-2">
                  <img src="${data.mensaje.foto}">
              </div>
              <p class="m-0 p-0">Nom</p>
              <h4>${data.mensaje.nom}</h4>
          </div>
          <!-- Info -->
          <div class="row m-auto" style="min-height: 240px; overflow: hidden;">
              <div class="col col-6">
                  <p class="m-0 p-0">Número de soci</p>
                  <h6 class="text-wrap mt-1">${data.mensaje.id["$oid"]}</h6>
              </div>
              <div class="col col-6 text-end">
                  <p class="m-0 p-0">Quota</p>
                  <h4>${data.mensaje.tarifa}</h4>
              </div>
              <div class="col col-6">
                  <p class="m-0 p-0">Grup</p>
                  <h4>-</h4>
              </div>
              <div class="col col-6 text-end">
                  <p class="m-0 p-0">Donat d'alta</p>
                  <h4>15/05/2023</h4>
              </div>
          </div>
          <!-- QR -->
          <div>
              <div class="col-4 m-auto">
                  <img class="img-fluid rounded" src="https://cdn.britannica.com/17/155017-050-9AC96FC8/Example-QR-code.jpg">
              </div>
          </div>
          `;
        }
        $(credencialModal).modal("show");
      })
      .catch((error) => {
        // Capturamos y manejamos cualquier error
        console.error("Error:", error);
      });
  }
  // If failure you qr code
  function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
  }

  let htmlscanner = new Html5QrcodeScanner("my-qr-reader", {
    fps: 1,
    qrbox: { width: 250, height: 250 },
  });

  // Render
  htmlscanner.render(onScanSuccess, onScanFailure);
});
