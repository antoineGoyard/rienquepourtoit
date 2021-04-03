function openNav() {
                $("#mySidenav").css('width','300px');
                $("#nav-front h1").addClass("visibility");
                $("#burger").addClass("visibility");
                $("#search-main").addClass("visibility");
  }
  
  function closeNav() {
 
    $("#mySidenav").css('width','0px');
    $("#nav-front h1").removeClass("visibility");
    $("#burger").removeClass("visibility");
    $("#search-main").removeClass("visibility");
    
  }



                // document.body.classList.add("my-mask");
                // setTimeout(function(){
                //     document.getElementById("side-nav").classList.remove("none");
                //     document.getElementById("contact").classList.remove("none");
                // },350);
                
/*
                var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                if (isMobile) {
                    document.getElementById("mySidenav").style.width = "70%";
                    document.getElementsByClassName("a-nav")[0].style.fontSize = "2.5rem";
                    document.getElementsByClassName("a-nav")[1].style.fontSize = "2.5rem";
                    document.getElementsByClassName("a-nav")[2].style.fontSize = "2.5rem";
                    document.getElementsByClassName("a-nav")[3].style.fontSize = "2.5rem";
                    document.getElementsByClassName("a-nav")[4].style.fontSize = "2.5rem";
                    document.getElementsByClassName("a-nav")[5].style.fontSize = "2.5rem";

                    document.getElementsByClassName("a-nav-lm")[0].style.fontSize = "2rem";
                    document.getElementsByClassName("a-nav-lm")[1].style.fontSize = "2rem";
                    document.getElementsByClassName("a-nav-lm")[2].style.fontSize = "2rem";

            }
  */