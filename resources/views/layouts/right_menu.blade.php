<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">LogOut</button>
        </form>
    </div>
</aside>
