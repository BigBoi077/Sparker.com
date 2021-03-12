import {placeClickEvent} from "../helpers/eventPlacers.js";
import {getAccordingElement, getAllElements} from "../helpers/elementGetter.js"
import ElementManager from "./ElementCreator.js";

export default class EventPlacer {

    placeClickEvents(app) {
        placeClickEvent(document.getElementById("add-option"), function () {
            new ElementManager().createNewInputField(app);
        })
    }

    placeSubmitEvent(app) {
        placeClickEvent(document.getElementById("sign-up-form"), function () {
            return app.user.isFieldsValid();
        })
    }

    placeRemovePollEvent() {
        const elemList = getAllElements("vote")
        for (let i = 0; i < elemList.length; i++) {
            placeClickEvent(elemList[i], function () {
                setTimeout(function(){
                    const button = elemList[i];
                    const formTarget = button.getAttribute("data-target-poll");
                    const wantedDeletedElement = getAccordingElement("data-form-id", formTarget);
                    wantedDeletedElement.parentNode.removeChild(wantedDeletedElement);
                }, 3000);
            })
        }
    }
}