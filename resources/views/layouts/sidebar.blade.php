<div class="col-lg-3 bg-success min-vh-100 navi" id="navi">
    <ul>
        <li>
            <a href="/home">
                <span class="icon">
                    <ion-icon name="business-outline"></ion-icon>
                </span>
                <span class="title">PTES KNHOM</span>
            </a>
        </li>

        <li>
            <a href="/home">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->hasRole('operator'))
            <li>
                <a href="/users">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Enab/Dis Users </span>
                </a>
            </li>
            <li>
                <a href="/pending">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <span class="title">Approval</span>
                </a>
            </li>
            <li>
                <a href="/contactList">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <span class="title">Message List</span>
                </a>
            </li>
        @endif
        @if (Auth::user()->hasRole('admin'))
            @if (Auth::user()->name == "admin")
            <li>
                <a href="/setting">
                    <span class="icon">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </span>
                    <span class="title">Admin or Operator</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->name == 'admin')
                <li>
                    <a href="/rmBackend">
                        <span class="icon">
                            <ion-icon name="trash-outline"></ion-icon>
                        </span>
                        <span class="title">Remove</span>
                    </a>
                </li>
            @endif
                <li>
                    <a href="/viewHistory">
                        <span class="icon">
                            <ion-icon name="archive-outline"></ion-icon>
                        </span>
                        <span class="title">Backend Log</span>
                    </a>
                <li>
            
            <li>
                <a href="/rmUser">
                    <span class="icon">
                        <ion-icon name="person-remove-outline"></ion-icon>
                    </span>
                    <span class="title">Remove users</span>
                </a>
            </li>
            @if (Auth::user()->name == 'admin')
            <li>
                <a href="/reset">
                    <span class="icon">
                        <ion-icon name="lock-open-outline"></ion-icon>
                    </span>
                    <span class="title">Authorization</span>
                </a>
            </li>
            @endif
        @endif
        
        <li>
            <a href="/logout">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
        
    </ul>
</div>

<!--@include('layouts.header')-->
