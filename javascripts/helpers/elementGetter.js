export function getRadioValue(fieldName) {
    const elements = document.getElementsByName(fieldName);
    for(let i = 0; i < elements.length; i++) {
        if(elements[i].checked) {
            return elements[i].value
        }
    }
}