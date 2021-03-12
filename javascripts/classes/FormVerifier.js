function isNamesOk(fname, lname, uname) {
    return fname.length > 0 && lname.length > 0 && uname.length > 0;
}

function isEmailOk(email) {
    return email.includes("@") && email.includes(".");
}

function islenghtOk(value, desiredLength) {
    return value.length > desiredLength;
}

function islenghtExect(value, absoluteLength) {
    return value.length === absoluteLength;
}

function isPhoneNumberOk(phoneNumber) {
    const regex = new RegExp("^(\\+\\d{1,2}\\s)?\\(?\\d{3}\\)?[\\s.-]\\d{3}[\\s.-]\\d{4}$");
    return regex.test(phoneNumber);
}

export default class FormVerifier {
    isOk(user) {
        return isNamesOk(user.firstname.value, user.lastname.value, user.username.value)
            && isEmailOk(user.email.value)
            && islenghtOk(user.password.value, 10)
            && islenghtExect(user.ssn.value, 9)
            && isPhoneNumberOk(user.phoneNumber)
            && islenghtOk(user.address, 15);
    }
}