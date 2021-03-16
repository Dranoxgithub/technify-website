@extends ('layouts.index')

@section ('content')
<!-- @guest  -->
<section id="banner">
				<div class="content d-flex flex-column justify-content-center">
                    <h3>Hey there, thanks for checking us out. <br> You're just one step away from changing the world!</h3>
                    <br>
                    <h1 style="color:#f6755e">Join us now!</h1>
                    <br>
					<ul class="actions">
						<li><a href="{{ route('login') }}" class="button special">Log in</a></li>
						<li><a href="{{ route('register') }}" class="button special">Register</a></li>
					</ul>
				</div>
            </section>
            
<!-- @else
@endguest -->
@endsection


