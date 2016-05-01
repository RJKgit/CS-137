function getInfo() {
    var parameters = location.search.substring(1).split("&");
    var temp = parameters[0].split("=");
    document.getElementById("productNum").value = unescape(temp[1]);
}
function isValidName(s) {
    return /^[A-Za-z\s]+$/.test(s);
}

function isValidEmail(s) {
    var x = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return x.test(s);
}

function isValidNumber(s) {
    return /^\d+$/.test(s);
}

function validateForm() {
    var validation = true;
    var msg = "Invalid field!";
    var productID = document.forms["emailForm"]["productID"].value;
    var productName = document.forms["emailForm"]["productName"].value;

    var quantity = document.forms["emailForm"]["quantity"].value;
    var firstName = document.forms["emailForm"]["first"].value;
    var lastName = document.forms["emailForm"]["last"].value;
    var email = document.forms["emailForm"]["email"].value;
    var phoneNumber = document.forms["emailForm"]["phone"].value;
    var creditCard = document.forms["emailForm"]["card"].value;
    var street = document.forms["emailForm"]["street"].value;
    var city = document.forms["emailForm"]["city"].value;
    var state = document.forms["emailForm"]["state"].value;
    var zip = document.forms["emailForm"]["zip"].value;

    var total = document.getElementById("total");
    var errorLabel = document.getElementById("errorMsg");

    //reset label
    errorLabel.style.display = "none";

    if (isValidNumber(quantity) == false || quantity == null || quantity == "") {
        msg = "Invalid QUANTITY field!";
        validation = false;
     } else if (isValidName(firstName) == false || firstName == null || firstName == "") {
        msg = "Invalid FIRST NAME field!";
        validation = false;
     } else if (isValidName(lastName) == false || lastName == null || lastName == "") {
        msg = "Invalid LAST NAME field!";
        validation = false;
     } else if (isValidEmail(email) == false || email == null || email == "") {
        msg = "Invalid EMAIL field!";
        validation = false;
     } else if (isValidNumber(phoneNumber) == false || phoneNumber == null || phoneNumber == "" || phoneNumber.length != 10) {
        msg = "Invalid PHONE NUMBER field!";
        validation = false;
     } else if (street == null || street == "") {
        msg = "Invalid STREET field!";
        validation = false;
     } else if (isValidName(city) == false || city == null || city == "") {
        msg = "Invalid CITY field!";
        validation = false;
     } else if (isValidName(state) == false || state == null || state == "") {
        msg = "Invalid STATE field!";
        validation = false;
     } else if (isValidNumber(zip) == false || zip == null || zip == "" || zip.length != 5) {
        msg = "Invalid ZIP field!";
        validation = false;
     } else if (isValidNumber(creditCard) == false || creditCard == null || creditCard == "" || creditCard.length < 16) {
        msg = "Invalid CREDIT CARD field!";
        validation = false;
     }

    if (!(validation)) {
        errorLabel.innerHTML = msg;
        errorLabel.style.display = "inline";
        return false;
    }
    var name = firstName + ' ' + lastName + '%0A';
    var product_info = "PN: " + document.emailForm.productNum.value + ' - Quantity: ' + quant + "%0A";
    var shipping_info = "Shipping Information: %0A%09" + document.emailForm.street.value + "%0A%09" + city + ', ' + zipCode + "%0A";
    var conclusion = "%0AThank you for shopping with us! %0A" + "FOOGLE"
    window.open('mailto:' + email + '?subject=' + 'FOOGLE: Order Confirmation!' + '&body=' + name + product_info + shipping_info +
            conclusion);
    return true;
}