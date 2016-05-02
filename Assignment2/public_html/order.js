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
    //var productID = document.emailForm.productID.value;
    //var productName = document.emailForm.productName.value;

    var quantity = document.emailForm.quantity.value;
    var firstName = document.emailForm.first.value;
    var lastName = document.emailForm.last.value;
    var email = document.emailForm.email.value;
    var phoneNumber = document.emailForm.phone.value;
    var creditCard = document.emailForm.card.value;
    var street = document.emailForm.street.value;
    var city = document.emailForm.city.value;
    var state = document.emailForm.state.value;
    var zip = document.emailForm.zip.value;

    var total = document.getElementById("total");
    var errorLabel = document.getElementById("errorMsg");

    //reset label
    errorLabel.style.visibility = "hidden";

    if (!(parseInt(quantity) > 0) || quantity == null || quantity == "") {
        errorLabel.innerHTML = "Invalid QUANTITY field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidName(firstName) == false || firstName == null || firstName == "") {
        errorLabel.innerHTML = "Invalid FIRST NAME field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidName(lastName) == false || lastName == null || lastName == "") {
        errorLabel.innerHTML = "Invalid LAST NAME field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidEmail(email) == false || email == null || email == "") {
        errorLabel.innerHTML = "Invalid EMAIL field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidNumber(phoneNumber) == false || phoneNumber == null || phoneNumber == "" || phoneNumber.length != 10) {
        errorLabel.innerHTML = "Invalid PHONE NUMBER field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidNumber(creditCard) == false || creditCard == null || creditCard == "" || creditCard.length != 16) {
        errorLabel.innerHTML = "Invalid CREDIT CARD field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (street == null || street == "") {
        errorLabel.innerHTML = "Invalid STREET field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidName(city) == false || city == null || city == "") {
        errorLabel.innerHTML = "Invalid CITY field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidName(state) == false || state == null || state == "") {
        errorLabel.innerHTML = "Invalid STATE field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }
     if (isValidNumber(zip) == false || zip == null || zip == "" || zip.length != 5) {
        errorLabel.innerHTML = "Invalid ZIP field!";
        errorLabel.style.visibility = "visible";
        return (false);
     }

    /*var name = firstName + ' ' + lastName + '%0A';
    var product_info = "PN: " + document.emailForm.productNum.value + ' - Quantity: ' + quant + "%0A";
    var shipping_info = "Shipping Information: %0A%09" + document.emailForm.street.value + "%0A%09" + city + ', ' + zipCode + "%0A";
    var conclusion = "%0AThank you for shopping with us! %0A" + "FOOGLE"
    window.open('mailto:' + email + '?subject=' + 'FOOGLE: Order Confirmation!' + '&body=' + name + product_info + shipping_info +
            conclusion);*/
    alert("Order Submitted!");
    return (true);
}