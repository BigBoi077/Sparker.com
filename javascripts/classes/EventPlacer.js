import {placeClickEvent} from "../helpers/eventPlacers.js";
import {getAllElements} from "../helpers/elementGetter.js";
import ElementCreator from "./ElementCreator.js";

export default class EventPlacer {

    placeClickEvents(app) {
        placeClickEvent(document.getElementById("add-option"), function () {
            new ElementCreator().createNewInputField(app)
        })
    }

    placeSubmitEvent(app) {
        placeClickEvent(document.getElementById("sign-up-form"), function () {
            return app.user.isFieldsValid()
        })
    }

    randomizeGender() {
        const radioButtons = getAllElements("radio-gender")
        radioButtons[Math.random() * radioButtons.length + 1].checked = true
    }
}