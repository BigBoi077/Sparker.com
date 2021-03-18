import {getAccordingElement, getAllElements, getSingleElement} from "../helpers/elementGetter.js";
import {getOptionDiv} from "../helpers/constants.js";

export default class ElementCreator {

    createDiv(className = null, id = null, dataAttributes = null) {
        const div = document.createElement("div");
        div.classList.add(className);
        div.id = id;
        div.setAttribute(dataAttributes);
        return div;
    }

    createNewInputField(app) {
        const inputFields = getSingleElement("input-fields");
        inputFields.append(this.getInputFieldNode(app.optionIndex));
        app.incrementOptionIndex();

        const deleteButtons = getAllElements("remove-button");
        for (let i =0; i < deleteButtons.length; i++) {
            const button = deleteButtons[i];
            button.addEventListener("click", function () {
                const optionTarget = button.getAttribute("data-option-target");
                const wantedDeletedElement = getAccordingElement("data-option-div", optionTarget);
                wantedDeletedElement.parentNode.removeChild(wantedDeletedElement);
                app.decrementOptionIndex();
            })
        }
    }

    getInputFieldNode(optionNumber) {
        const div = document.createElement("div");
        div.classList.add("field");
        div.setAttribute("data-option-div", `option-${optionNumber}`);
        div.innerHTML = getOptionDiv(optionNumber);
        return div;
    }
}