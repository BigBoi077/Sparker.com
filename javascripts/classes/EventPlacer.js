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
}