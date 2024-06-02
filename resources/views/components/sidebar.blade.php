<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative"  >
        <div class="d-flex justify-content-between align-items-center">
            <div class="" style="width:70%; ">
                <x-logo/>
            </div>
           
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <!-- <li class="sidebar-title">Menu</li> -->
            
            <li
                class="sidebar-item  ">
                <a href="{{ url('/home') }}" class='sidebar-link'>
                    <i class="bi bi-columns-gap"></i>
                    <span>Dashboard</span>
                </a>
                

            </li>


            <li
                class="sidebar-item  ">
                <a href="{{ url('/chats') }}" class='sidebar-link'>
                <i class="bi bi-chat-dots"></i>
                    <span>chats</span> 
                </a>
                

            </li>

            
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
</svg>
                    <span>  Personal  <span class="badge rounded-pill bg-warning text-dark">Pro </span></span>
                </a>
                
                <ul class="submenu ">
                    

                <li
                class="submenu-item   ">
                <a href="{{ url('/clients') }}" class='submenu-link'>
                <i class="bi bi-collection" style="color:var(--secondary-red)"></i>
                    <span>&nbsp Clients</span>
                </a>
             </li>



                <li
                class="submenu-item   ">
                <a href="{{ url('/home') }}" class='submenu-link'>
                <i class="bi bi-calendar4-week" style="color:var(--secondary-red)"></i>
                    <span> &nbsp Tasks</span> 
                </a>


              


                <li class="submenu-item  ">
                        <a href="{{ url('/chats') }}" class="submenu-link">
                        <i class="bi bi-card-checklist" style="color:var(--secondary-red)"></i>
                           &nbsp Projects
                        </a>
                        
                    </li>
                    
                    

                    <li class="submenu-item  ">
                        <a href="component-dropdown.html" class="submenu-link">
                        <i class="bi bi-wallet" style="color:var(--secondary-red)"></i>
                       &nbsp Wallet
                    </a>
                        
                    </li>
                    <li class="submenu-item  ">
                        <a href="component-dropdown.html" class="submenu-link">
                        <i class="bi bi-file-earmark" style="color:var(--secondary-red)"></i>
                            &nbsp Documents
                        </a>
                        
                    </li>
                    
                    
                    
                    
                    
                   
                    
                </ul>
                

            </li>
            
            
           
            
            
            

            <li
                class="sidebar-item  ">
                <a href="{{ url('/profile') }}" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
                

            </li>
            <li
                class="sidebar-item  ">
                <a href="{{ route('logout') }}" class='sidebar-link' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                               </form>
                </a>
                

            </li>
            
        </ul>
    </div>
</div>

</div>

</div>



