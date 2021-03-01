import {placeRadioEvent} from "../helpers/eventPlacers.js"
import {getRadioValue} from "../helpers/elementGetter.js"
import FormVerifier from "./FormVerifier.js"

export default class User {
    constructor() {
        placeRadioEvent("gender")
        this.username = document.getElementById("username")
        this.firstname = document.getElementById("firstname")
        this.lastname = document.getElementById("lastname")
        this.username = document.getElementById("username")
        this.email = document.getElementById("email")
        this.password = document.getElementById("password")
        this.ssn = document.getElementById("ssn")
        this.phoneNumber = document.getElementById("phone-number")
        this.address = document.getElementById("address")
        this.gender = getRadioValue('gender')
    }

    isFieldsValid() {
        const formVerifier = new FormVerifier()
        return formVerifier.isOk(this)
    }
}