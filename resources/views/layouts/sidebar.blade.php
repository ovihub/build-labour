<nav class="d-none d-md-block sidebar-container">
   <div class="sidebar-header">
      <div class="sidebar-logo">
         <img class="sidebar-logo-image" src="/img/build-labour-logo-orange.png" 
               srcset="/img/build-labour-logo-orange@2x.png 2x, /img/build-labour-logo-orange@3x.png 3x"/>
      </div>
      <div class="sidebar-title">
         {{ config('app.name', 'Appetiser Apps') }}
      </div>
      <div class="sidebar-project">
          ADMIN PORTAL
      </div>
   </div>
   <div class="sidebar-sticky">
      <div class="sidebar-nav-title">
         NAVIGATION
      </div>
      <ul class="sidebar nav flex-column">
         <li class="nav-item">
            <a class="nav-link nav-link-custom" href="{{ '/all/users/?token=' . request()->input('token') }}">
               Users
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link nav-link-custom" href="{{ '/all/jobs/?token=' . request()->input('token') }}">
               Jobs
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link nav-link-custom" href="{{ '/all/tickets/?token=' . request()->input('token') }}">
               Tickets
            </a>
         </li>
         <li class="nav-item">
            <logout text-only="true"></logout>
         </li>
      </ul>
   </div>
</nav>