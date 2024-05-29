<!DOCTYPE html>
<html>

<body>
    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            {{ __('Keluar') }}
        </x-responsive-nav-link>
    </form>
</body>

</html>