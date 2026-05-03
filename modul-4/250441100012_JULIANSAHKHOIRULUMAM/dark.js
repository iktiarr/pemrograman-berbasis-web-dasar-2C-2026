document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const toggleBtn = document.getElementById("themeToggle");

    // default
    if (!localStorage.getItem("theme")) {
        localStorage.setItem("theme", "light");
    }

    // apply
    if (localStorage.getItem("theme") === "dark") {
        html.classList.add("dark");
        toggleBtn.textContent = "☀️";
    } else {
        html.classList.remove("dark");
        toggleBtn.textContent = "🌙";
    }

    // toggle
    toggleBtn.addEventListener("click", () => {
        html.classList.toggle("dark");

        if (html.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
            toggleBtn.textContent = "☀️";
        } else {
            localStorage.setItem("theme", "light");
            toggleBtn.textContent = "🌙";
        }
    });
});




document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const simbol = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    let isValid = true;


    emailError.classList.add('hidden');
    passwordError.classList.add('hidden');


    if (!simbol.test(email)) {
        emailError.classList.remove('hidden');
        isValid = false;
    }

    if (password.length < 6) {
        passwordError.classList.remove('hidden');
        isValid = false;
    }

    if (!isValid) {
        alert("Gagal Login: Mohon periksa kembali email dan password Anda!");
    } else {
        alert("Login Berhasil!");
        window.location.href = "lendingpage.html";
    }
});