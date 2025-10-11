function compute_days(){
    const dob = get_dob();
    const birthDate = new Date(dob);
    const today = new Date();

    const diffMs = today - birthDate;
    const days = Math.floor(diffMs / (1000 * 60 * 60 * 24));

    write_answer_days(
        "You are " + days + " days old."
    );
}

function compute_circle(){
    const screen = get_screen_dims();
    const radius = Math.min(screen.width, screen.height) / 2;
    const area = Math.PI * Math.pow(radius, 2);

    write_answer_circle(
        "Your screen dimensions are " + screen.width + " x " + screen.height + ".<br>"
        + "So the radius will be " + radius + " pixels, and the area will be " + area.toFixed(2) + " pixels."
    );
}

function check_palindrome() {
    const text_input = get_palindrome(); 
    const cleanText = [];

    for (let i = 0; i < text_input.length; i++) {
        const c = text_input[i].toLowerCase();
        if ((c >= 'a' && c <= 'z') || (c >= '0' && c <= '9')) {
            cleanText.push(c);
        }
    }

    let isPalindrome = true;
    for (let i = 0; i < cleanText.length / 2; i++) {
        if (cleanText[i] !== cleanText[cleanText.length - 1 - i]) {
            isPalindrome = false;
            break;
        }
    }

    if (isPalindrome) {
        write_answer_palindrome(text_input + " is a palindrome.");
    } else {
        write_answer_palindrome(text_input + " isn't a palindrome.");
    }
}

function create_fibo(){
    const fibo_length = document.getElementById("fibo_length").value;

    if (isNaN(fibo_length) || fibo_length < 0 || fibo_length == 0) {
        write_answer_fibo("Wrong format!");
        return;
    }

    const fibo = [];
    if (fibo_length == 1) {
        fibo.push(0);
    } 
    else {
        fibo.push(0, 1);
        for (let i = 2; i < fibo_length; i++) {
            fibo.push(fibo[i - 1] + fibo[i - 2]);
        }
    }

    write_answer_fibo(
        fibo.join()
    );
}
