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
    alert('Update');
    let response = isValid(decodeText);
    alert(response);
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

  function obtenerDominio(url) {
    // Expresión regular para extraer el dominio de una URL
    var dominioRegex = /^(?:https?:\/\/)?(?:[^@\n]+@)?(?:www\.)?([^:\/\n?]+)/gi;
    // Intentamos hacer coincidir la expresión regular con la URL proporcionada
    var matches = dominioRegex.exec(url);
    // Si hay coincidencias y el primer grupo capturado existe
    if (matches && matches[1]) {
      // Devolvemos el primer grupo capturado, que contiene el dominio
      return matches[1];
    } else {
      // Si no hay coincidencias o el grupo capturado no existe, devolvemos null
      return null;
    }
  }

  function isValid(decodeText, decodeResult) {
    var dominio = obtenerDominio(decodeText); // Usa la función obtenerDominio del ejemplo anterior

    // Verifica si el dominio es igual a "musicsandorra.com"
    if (dominio === "musicsandorra.com") {
      return true;
    } else {
      return false;
    }
  }
  // Render
  htmlscanner.render(isValid);
});
