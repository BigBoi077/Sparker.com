import App from "./classes/App.js"
import { placeClickEvent } from "./helpers/eventPlacers";

const app = new App()

placeClickEvent(document.getElementById("sign-up-form", function () {
    return app.user.isFieldsValid()
}))

