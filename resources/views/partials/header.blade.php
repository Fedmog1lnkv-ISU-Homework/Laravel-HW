<header>
    <h1>{{ $pageTitle ?? 'Laravel-HW' }}</h1>
    <nav>
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('note.add.page') }}">Create Note</a>
        <a href="{{ route('note.get.all') }}">All Notes</a>

		@auth('web')
			<a href="{{ route('user.home') }}">Profile</a>
		@endauth

		@guest('web')
			<a href="{{ route('login.page') }}">Login</a>
		@endguest
    </nav>
</header>
