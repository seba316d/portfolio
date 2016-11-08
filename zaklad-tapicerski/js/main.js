function main_logic()
{
    //globals
        var slides = 3;
        var active_slide = 1;
    this.start = function()
    {
        $("div.slider").height(); 
        preload_slides(); //load slides img to smooth change
        slider_controls(); //enable slider controls
        setInterval(function() {auto_slide_change()}, 8000); //enable automatic slide change
    }
    function preload_slides(){
        var preload = "";
        for(i=1;i<slides+1;i++){
            preload += ("url(./img/slider"+i+".jpg) ");
        }
        $("#preloader").css('display',"none");
        $("#preloader").css('content',preload);
    }
    function slider_controls(){      
        $('#arrow_right > div').click(function(){
            active_slide++;
            if(active_slide > slides)active_slide = 1;
            change_slide(active_slide);           
        return false;
        });
        $('#arrow_left > div').click(function(){
            active_slide--;
            if(active_slide < 1)active_slide = slides;
            change_slide(active_slide);           
        return false;
        });
    }
    function change_slide(nr){
        var slide_img = "url(./img/slider"+nr+".jpg) no-repeat scroll center top / cover";
        $('div.slider').animate({opacity: 0.4}, 400,function(){ 
            $('div.slider').css('background', slide_img);
            $('div.slider').css('opacity', 0.4);
            $('div.slider').animate({opacity: 1}, 400);
        });
        
        
        return false;
    }
    function auto_slide_change(){
        active_slide++;
        if(active_slide > slides)active_slide = 1;
        change_slide(active_slide);
    }
}
 
$(function()
{
    window.app = new main_logic();
    window.app.start();
});