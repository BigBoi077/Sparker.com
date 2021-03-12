export function getRadioValue(fieldName) {
    const elements = document.getElementsByName(fieldName);
    for(let i = 0; i < elements.length; i++) {
        if(elements[i].checked) {
            return elements[i].value;
        }
    }
}

export function getSingleElement(elementName) {
    return document.getElementById(elementName);
}

export function getAllElements(elementClassName) {
    return document.getElementsByClassName(elementClassName);
}

export function getAccordingElement(dataAttribute, wantedAttributeValue) {
    const elements = document.querySelectorAll(`[${dataAttribute}]`);
    for (let i =0; i < elements.length; i++) {
        if (elements[i].getAttribute(dataAttribute) === wantedAttributeValue) {
            return elements[i];
        }
    }
    return null;
}