const sidebar = document.querySelector('#sidebar');
const regbar = document.querySelector('#regbar');
const menubar = document.querySelector('#menubar');
const create = document.querySelector('#create');
const menu = document.querySelector('#menu');
const join = document.querySelector('#join');
const bar = document.querySelector('#bar');
const close = document.querySelector('#close');
const remove = document.querySelector('#remove');
const menuclose = document.querySelector('#menuclose');
// my own consts declarations 

const aboutChelsea = document.querySelector('.shift');
const stamFord = document.querySelector('.stamford');
const Fans = document.querySelector('.fans');
const navwhiteAbout = document.querySelector('.navwhite2');
const navWhite3 = document.querySelector('.navwhite3');
const navWhite4 = document.querySelector('.navwhite4');
const news = document.querySelector('.navwhite');

// another set of declarations 
const Shift = document.querySelector('.shift2');
const Videos = document.querySelector('.videos');
const Matches = document.querySelector('.matches');
const Teams = document.querySelector('.teams');
const Tickets = document.querySelector('.tickets');
const Club = document.querySelector('.club');
const Shop = document.querySelector('.shop');

const t1 = document.querySelector('.T1');
const t2 = document.querySelector('.T2');
const t3 = document.querySelector('.T3');
const t4 = document.querySelector('.T4');
const t5 = document.querySelector('.T5');
const t6 = document.querySelector('.T6');


const DeskSearch = document.querySelector('.deskSearch');
const rad1 = document.querySelector('#rad1');



// where my js code starts 
// ######## start of change 
aboutChelsea.addEventListener("mouseover", () => {
  news.style.display = "none"
  navwhiteAbout.style.display = "flex"
})

aboutChelsea.addEventListener("mouseout", () => {
  news.style.display = "flex"
  navwhiteAbout.style.display = "none"
})

stamFord.addEventListener("mouseover", () => {
  news.style.display = "none"
  navWhite3.style.display = "flex"
})

stamFord.addEventListener("mouseout", () => {
  news.style.display = "flex"
  navWhite3.style.display = "none"
})

Fans.addEventListener("mouseover", () => {
  news.style.display = "none"
  navWhite4.style.display = "flex"
})

Fans.addEventListener("mouseout", () => {
  news.style.display = "flex"
  navWhite4.style.display = "none"
})

// ################

Shift.addEventListener("mouseover", () => {
  t1.style.display = "flex"
})

Shift.addEventListener("mouseout", () => {
  t1.style.display = "none"
})

Videos.addEventListener("mouseover", () => {
  t2.style.display = "flex"
})

Videos.addEventListener("mouseout", () => {
  t2.style.display = "none"
})

Matches.addEventListener("mouseover", () => {
  t3.style.display = "flex"
})

Matches.addEventListener("mouseout", () => {
  t3.style.display = "none"
})

Teams.addEventListener("mouseover", () => {
  t4.style.display = "flex"
})

Teams.addEventListener("mouseout", () => {
  t4.style.display = "none"
})

Tickets.addEventListener("mouseover", () => {
  t5.style.display = "flex"
})

Tickets.addEventListener("mouseout", () => {
  t5.style.display = "none"
})

Club.addEventListener("mouseover", () => {
  t6.style.display = "flex"
})

Club.addEventListener("mouseout", () => {
  t6.style.display = "none"
})

menu.addEventListener("mouseover", () => {
  DeskSearch.style.display = "flex"
})

rad1.addEventListener("mouseout", () => {
  DeskSearch.style.display = "none"
})



// where my js code ends 



menu.addEventListener('click', () => {
    
    sidebar.style.display = "block"
});

join.addEventListener('click', () => {
    
    regbar.style.display = "block"
});
create.addEventListener('click', () => {
    
    regbar.style.display = "block"
});
bar.addEventListener('click', () => {
    
    menubar.style.display = "block"
});
close.addEventListener('click', () => {
    
    sidebar.style.display = "none"
    regbar.style.display = "none"
    menubar.style.display = "none"
});
remove.addEventListener('click', () => {
    
    sidebar.style.display = "none"
    regbar.style.display = "none"
    menubar.style.display = "none"
});
menuclose.addEventListener('click', () => {
    
    sidebar.style.display = "none"
    regbar.style.display = "none"
    menubar.style.display = "none"
});


var responsiveSlider = function() {

    var slider = document.getElementById("slider");
    var sliderWidth = slider.offsetWidth;
    var slideList = document.getElementById("slideWrap");
    var count = 1;
    var items = slideList.querySelectorAll("li").length;
    var prev = document.getElementById("prev");
    var next = document.getElementById("next");
    
    window.addEventListener('resize', function() {
      sliderWidth = slider.offsetWidth;
    });
    
    var prevSlide = function() {
      if(count > 1) {
        count = count - 2;
        slideList.style.left = "-" + count * sliderWidth + "px";
        count++;
      }
      else if(count = 1) {
        count = items - 1;
        slideList.style.left = "-" + count * sliderWidth + "px";
        count++;
      }
    };
    
    var nextSlide = function() {
      if(count < items) {
        slideList.style.left = "-" + count * sliderWidth + "px";
        count++;
      }
      else if(count = items) {
        slideList.style.left = "0px";
        count = 1;
      }
    };
    
    next.addEventListener("click", function() {
      nextSlide();
    });
    
    prev.addEventListener("click", function() {
      prevSlide();
    });
    
    setInterval(function() {
      nextSlide()
    }, 15000);
    
    };
    
    window.onload = function() {
    responsiveSlider();  
    }
    