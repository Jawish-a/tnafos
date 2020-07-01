<div id="wrapper">
    @include('layouts.admin.partials.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('layouts.admin.partials.topbar')
            {{-- page content goes here --}}
            <div class="container-fluid">
                {{-- page title --}}
                <h1 class="h3 mb-4 text-gray-800">@yield('page_title')</h1>
                @yield('content')
            </div>
        </div>
        @include('layouts.admin.partials.footer')

    </div>

</div>
{{-- javascripts and other scripts --}}
@include('layouts.admin.partials.script')
{{-- logout --}}
@include('layouts.admin.partials.logout')
