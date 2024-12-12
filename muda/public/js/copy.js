function copyToClipboard(elementId) {
  var aux = document.createElement("input");
  aux.setAttribute("value", elementId.getAttribute("value"));
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");
  document.body.removeChild(aux);
}
