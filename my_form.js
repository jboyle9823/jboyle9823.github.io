function validate(event) {
    event.preventDefault();

    // Get form values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const demeanor = document.getElementById("demeanor").value;

    if (name === "") {
        alert("Please enter your name.");
        return false;
    }

    if (email === "") {
        alert("Please enter your email address.");
        return false;
    }

    const personality = document.querySelector('input[name="personality"]:checked');
    const power = document.querySelector('input[name="power"]:checked');
    const asset = document.querySelector('input[name="asset"]:checked');
    const saving = document.querySelector('input[name="saving"]:checked');

    if (!personality) {
        alert("Please select your most valued personality trait.");
        return false;
    }

    if (!power) {
        alert("Please select the trait you value most in a superpower.");
        return false;
    }

    if (!asset) {
        alert("Please select the best asset.");
        return false;
    }

    if (!saving) {
        alert("Please choose who you would save.");
        return false;
    }

    if (demeanor === "" || demeanor < 1 || demeanor > 10) {
        alert("Please rate your demeanor from 1 to 10.");
        return false;
    }
    return true;
}
