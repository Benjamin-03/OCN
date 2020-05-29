// libraries
import $ from 'jquery';
import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min';

// events

$(document).ready(function(){
    // $('aside#layoutSidenav_nav .ocn-sidenav-menu a.nav-link').each(function(){
    //     var url = (window.location.href).substr(32);
    //     console.log(url);

    //     if(url === this.href){
    //         this.addClass('active');
    //     }
        
    // });

    $("#sidebarToggle").on("click", (e) => {
        e.preventDefault();
        $("body").toggleClass("ocn-sidenav-toggled");
    });
});


    // Add active state to sidbar nav links

    // console.log(page);
    // var href = $;

     
    
    // console.log(href);
    
    // $('a.nav-link').on('click', (e) => {
    //     e.preventDefault();
    //     console.log(this.href);
    // });
    
    // $("#layoutSidenav_nav .ocn-sidenav a.nav-link").each(function () {
    //     if (this.href === page) {
    //         $(this).addClass('active');
    //     }
    // });

    // Toggle the side navigation