export function placeRadioEvent(radioField) {
    const buttons = document.getElementsByName(radioField);
    const button = buttons[parseInt(Math.random() * buttons.length)];
    button.checked = true;
}

export function placeClickEvent(elem, callback) {
    elem.addEventListener("click", callback);
}
