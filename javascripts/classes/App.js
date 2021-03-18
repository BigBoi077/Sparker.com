import User from "../classes/User.js";
import EventPlacer from "../classes/EventPlacer.js";

export default class App {

    constructor() {
        this.optionIndex = 4;
    }

    placeOptionCreationEvents() {
        new EventPlacer().placeClickEvents(this);
    }

    placeFormSubmitEvent() {
        this.user = new User();
        new EventPlacer().placeSubmitEvent(this);
    }

    incrementOptionIndex() {
        this.optionIndex++;
    }

    decrementOptionIndex() {
        this.optionIndex--;
    }
}