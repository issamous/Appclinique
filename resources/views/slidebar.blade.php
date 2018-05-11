
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
           
            <li  class="{{ request()->route()->uri=='dashbord'?'active':''}}">
                <a href="{{ url('dashbord') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li class="{{ request()->route()->uri=='administrateurs' || request()->route()->uri=='administrateurs/create'  || request()->route()->uri=='administrateurs/{id}/edit' ?'active':''}}">
                <a href="#"><i class="fa fa-hospital-o"></i> <span class="nav-label">Administrateurs</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li ><a href="{{ url('administrateurs') }}"  style="{{ request()->route()->uri=='administrateurs'?'color: #ffffff !important;':''}}">Liste des Admin</a></li>
                    <li><a style="{{ request()->route()->uri=='administrateurs/create'?'color: #ffffff !important;':''}}" href="{{ url('administrateurs/create') }}">Ajouter un Admin</a></li>
                </ul>
            </li>

            <li class="{{ request()->route()->uri=='cliniques' || request()->route()->uri=='cliniques/create'  || request()->route()->uri=='cliniques/{id}/edit' ?'active':''}}">
                <a href="#"><i class="fa fa-hospital-o"></i> <span class="nav-label">Clinique</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li ><a href="{{ url('cliniques') }}"  style="{{ request()->route()->uri=='cliniques'?'color: #ffffff !important;':''}}">Liste des Cliniques</a></li>
                    <li><a style="{{ request()->route()->uri=='cliniques/create'?'color: #ffffff !important;':''}}" href="{{ url('cliniques/create') }}">Ajouter un Clinique</a></li>
                </ul>
            </li>
        
            
            <li class="{{ request()->route()->uri=='laboratoires'|| request()->route()->uri=='laboratoires/create' || request()->route()->uri=='laboratoires/{id}/edit' ?'active':''}}">
                <a href=""><i class="fa fa-1x fa-flask"></i> <span class="nav-label">Laboratoires</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('laboratoires') }}"  style="{{ request()->route()->uri=='laboratoires'?'color: #ffffff !important;':''}}">Liste des Laboratoires</a></li>
                    <li><a style="{{ request()->route()->uri=='laboratoires/create'?'color: #ffffff !important;':''}}"  href="{{ url('laboratoires/create') }}">Ajouter un Laboratoire</a></li>
                </ul>
            </li>


            <li class="{{ request()->route()->uri=='medciens' || request()->route()->uri=='medciens/create' || request()->route()->uri=='medciens/{id}/edit' ?'active':''}}">
                <a href=""><i class="fa fa-user-md"></i> <span class="nav-label">Medcien</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('medciens') }}"  style="{{ request()->route()->uri=='medciens'?'color: #ffffff !important;':''}}">Liste des Medcien</a></li>
                    <li><a style="{{ request()->route()->uri=='medciens/create'?'color: #ffffff !important;':''}}"  href="{{ url('medciens/create') }}">Ajouter un Medcien</a></li>
                </ul>
            </li>



             <li class="{{ request()->route()->uri=='patients' || request()->route()->uri=='patients/create'?'active':''}}">
                <a href=""><i class="fa fa-bed"></i> <span class="nav-label">Patients</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li ><a style="{{ request()->route()->uri=='patients'?'color: #ffffff !important;':''}}" href="{{ url('patients') }}">Liste des patients</a></li>
                    <li><a  style="{{ request()->route()->uri=='patients/create'?'color: #ffffff !important;':''}}"  href="{{ url('patients/create') }}">Ajouter un patient</a></li>
                </ul>
            </li>


        </ul>

    </div>
</nav>