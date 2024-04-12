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
        let message = data["error"]
          ? "Credencial invalida"
          : "Credencial valida";
        document.getElementById("log-message").innerHTML = `
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="me-auto">Validació</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            ${message}
          </div>
        </div>
        `;
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
    fps: 10,
    qrbox: { width: 250, height: 250 },
  });

  // Render
  htmlscanner.render(onScanSuccess, onScanFailure);
});
