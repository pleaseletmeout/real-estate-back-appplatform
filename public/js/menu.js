let toggle = document.getElementById("toggle");
let navigation = document.getElementById("navi");
let main = document.getElementById("backend_main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
    //if(document.getElementById("navi").className == 'col-12 col-md-4 col-lg-2 bg-success p-0 m-0 min-vh-100 border-start border-primary border-1 navi' && document.getElementById("backend_main").className == 'col-md-7 col-12 col-lg-9 ms-5 main')
    //{
    //    document.getElementById("navi").className = 'col-12 col-md-4 col-lg-2 bg-success p-0 m-0 min-vh-100 border-start border-primary border-1 navi active';
    //    document.getElementById("backend_main").className == 'col-md-7 col-12 col-lg-9 ms-5 main active';
    //}
    //else
    //{
    //    document.getElementById("navi").className = 'col-12 col-md-4 col-lg-2 bg-success p-0 m-0 min-vh-100 border-start border-primary border-1 navi'
    //    document.getElementById("backend_main").className == 'col-md-7 col-12 col-lg-9 ms-5 main';
    //}
  };