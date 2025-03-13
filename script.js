document.addEventListener("DOMContentLoaded", function() {
    const page = window.location.pathname.split("/").pop();
    let text = "";
    
    if (page === "register.php") {
        text = "kamu mau curhatkan, tapi belum punya akun. sini buat dulu, aku tunggun kok";
    }
    
    let index = 0;
    const typingElement = document.querySelector(".typing");

    function type() { 
        if (index < text.length) {
            typingElement.innerHTML += text.charAt(index);
            index++;
            setTimeout(type, 50);
        }
    }
    
    if (text) {
        typingElement.innerHTML = "";
        type();
    }
});
