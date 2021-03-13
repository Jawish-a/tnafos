<ul class="navbar-nav bg-gradient-tnafos sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon">
            @include('layouts.logo')
        </div>
        <div class="sidebar-brand-text mx-3">{{env('APP_NAME')}} <sup>{{env('APP_VERSION')}}</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Institute
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-university"></i>
            <span>Company</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route('company.index')}}">Profile</a>
                <a class="collapse-item" href="{{route('service.index')}}">Services</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
            aria-controls="users">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Users</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('user.index')}}">Show List</a>
                <a class="collapse-item" href="{{route('user.create')}}">Create</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Bills
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#requests" aria-expanded="true"
            aria-controls="requests">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Purchase Requests</span>
        </a>
        <div id="requests" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('purchase_request.incomming')}}">Incomming</a>
                <a class="collapse-item" href="{{route('purchase_request.outgoing')}}">Outgoing</a>
            </div>
        </div>
    </li>
    {{-- estimates --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#estimates" aria-expanded="true"
            aria-controls="estimates">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Estimates</span>
        </a>
        <div id="estimates" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('estimate.incomming')}}">Incomming</a>
                <a class="collapse-item" href="{{route('estimate.outgoing')}}">Outgoing</a>
            </div>
        </div>
    </li>
    {{-- invoice --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invoices" aria-expanded="true"
            aria-controls="invoices">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Invoices</span>
        </a>
        <div id="invoices" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('invoice.incomming')}}">Incomming</a>
                <a class="collapse-item" href="{{route('invoice.outgoing')}}">Outgoing</a>
            </div>
        </div>
    </li>

    {{-- end of estimates --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        App Settings
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('settings.index')}}">
    <i class="fas fa-fw fa-table"></i>
    <span>Settings</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
