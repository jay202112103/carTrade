@if (session()->has('admin'))
    @include('admin.sidenav.adminSideNav')
@else
    {{session(['sessionExistError'=>'Please login first'])}}
    <script>
        window.location= "/login";
    </script>
@endif