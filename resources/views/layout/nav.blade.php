<nav>
    <div>
        <a href="{{route('login')}}">log in </a>
        <a href="{{route('register')}}">sign up </a>
        @auth()
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm" type="submit"> Logout </button>
        </form>
        <h2>{{Auth::user()->name}}</h2>
        @endauth
    </div>
</nav>
