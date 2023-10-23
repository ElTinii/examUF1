// Amb aquest snippet, prevenim el missatge de "Confirm form resubmission"
// Només ho apliquem al index, ja que quan es seleccionava la quantitat
// d'articles per pàgina o el mètode d'ordenació i es recarregava la pàgina,
// sortia el missatge de reenviament del formulari, quan és innecessari

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
