const navigation = document.querySelector(".navigation")
document.querySelector(".toggle").onclick = function (){
    this.classList.toggle('active')
    navigation.classList.toggle("active")
}





$(document).ready(function() {
    $(".submenu").hide();
    $("#projectCenterLink").click(function(e) {
        e.preventDefault();
        $(".submenu").slideToggle();
        $("#chevronIcon").toggleClass("rotate");
    });
});


