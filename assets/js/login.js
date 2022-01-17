(function() {
    const mainTitle = document.querySelector("#mainTitle");
    const titleBack = document.querySelector('#titleBack');
    const homeImgs = document.querySelectorAll('.homeImg img');
    
    titleBack.style.padding="0px";
    
    $('.autoplay').slick({
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
        });
    mainTitle.style.transform = "translateY(250px)";
    
}())