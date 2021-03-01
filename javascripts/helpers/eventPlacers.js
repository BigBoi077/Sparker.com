export function placeRadioEvent(radioField) {
    const buttons = document.getElementsByName(radioField)
    const button = buttons[parseInt(Math.random() * buttons.length)]
    console.log(button)
    button.checked = true
}
