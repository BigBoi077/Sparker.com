import {getAccordingElement, getAllElements, getSingleElement} from "../helpers/elementGetter.js";

export default class ElementCreator {

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
        div.innerHTML =
                `<div class="columns">
                    <div class="column is-11">
                        <input id="title" name="options[]" class="input" type="text" placeholder="Dragon fruit">
                    </div>
                    <div class="column d-flex justify-content-center">
                        <button type="button" class="button is-danger remove-button" data-option-target="option-${optionNumber}">
                            <span class="icon is-small">
                              <i class="fas fa-minus-circle"></i>
                            </span>
                        </button>
                    </div>
                </div>`;
        return div;
    }
}