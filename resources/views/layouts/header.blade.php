    <div class="container-fluid ps-2" id="topbar">
            <div class="toggle" id="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>        
            <div class="users ms-5">
            <span class="admin_user h-50"> Welcome {{Auth::user()->name}}</span>    
            <ion-icon id="user_backend" class="pt-2"name="person-outline"></ion-icon>
            </div>
    </div>
   
