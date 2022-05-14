let MenuItems = document.querySelector(".menuItems");
    MenuItems.style.maxHeight ="0px";
    function Handle()
    {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "400px";
        }
        else {
            MenuItems.style.maxHeight = "0px";
        }
}


let Redirect = function(){
    window.location.href = "./register.php";
}