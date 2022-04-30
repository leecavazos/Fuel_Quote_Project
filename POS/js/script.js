// Toggle the visibility of password
function togglePassword() {
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#passInput"); 
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the icon
    togglePassword.classList.toggle("bi-eye");
};

// Toggle the sidebar of admin pages
function toggleSideBar() {
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");
    
    btn.onclick = function(){
        sidebar.classList.toggle("active");
    }
    searchBtn.onclick = function(){
        sidebar.classList.toggle("active");
    }   
};
