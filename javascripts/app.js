import App from "./classes/App.js"

const app = new App()

function isFormOk() {
    return app.user.isFieldsValid()
}