
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>Transaksi</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/application/admin/product" class="nav-link">
                <i class="nav-icon fas fa-box-open"></i>
                <p>Product</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" id="logout-btn" class="nav-link">
                <i class='nav-icon fas fa-sign-out-alt'></i>
                <p>Logout</p>
            </a>
            <form action="/logout" id="form-logout" method="post">
                @csrf
                <button type="submit" hidden></button>
            </form>
        </li>
    </ul>
</nav>

@section('scripts')
   <script type="text/javascript">
        $( document ).ready(function() {
        });

        $( "#logout-btn" ).click(function() {
            $( "#form-logout" ).submit();
        });
   </script>

@endsection