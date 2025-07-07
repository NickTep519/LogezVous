const input = document.querySelector("#phone");
const iti = window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function (success, failure) {
        fetch("https://ipinfo.io/json?token=ee0d63017fcc15")
            .then((resp) => resp.json())
            .then((resp) => {
                success(resp.country);
            })
            .catch(() => success("BJ"));
    },
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
});

// Quand on soumet le formulaire, on récupère aussi le dial code
input.form.addEventListener("submit", function (e) {
    const dialCode = iti.getSelectedCountryData().dialCode;
    document.querySelector("#dial_code").value = "+" + dialCode;
});

// if (!iti.isValidNumber()) {
//   alert("Numéro invalide !");
//   e.preventDefault();
// }
