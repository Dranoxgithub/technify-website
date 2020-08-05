<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="/home">Technify</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="{{ Request::is('home*') ? 'nav-link active' : 'nav-link' }}" href="/home">Home</a>
    </li>
    <li class="nav-item">
        <a class="{{ Request::is('project_listing*') ? 'nav-link active' : 'nav-link' }}" href="/project_listing">Projects</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Join us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="">NGOs</a>
        <a class="dropdown-item" href="#">Tech professional & Student</a>
        
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>

