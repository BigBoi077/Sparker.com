import {placeClickEvent} from "../helpers/eventPlacers.js";
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

    placeRemovePollEvent() {
        placeClickEvents(document.getElementsByClassName("vote"))
    }
}