  

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>viewpage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta charset="UTF-8">
  
    <script src="{{asset('js/friends/quests.js')}}"></script>
    <script src="{{asset('js/friends/acceptfriens.js')}}"></script>
        <script src="{{asset('js/friends/ignore.js')}}"></script>

    <title></title>
</head>



<nav class="navbar navbar-expand-md" id="main-navbar">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ img('logo') }}" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

    <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav ml-auto align-items-center">

         <li>

<button style="background-color: #383A3F" type="button" class="btn  listquests" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fas fa-user-plus"></i>
</button>
         </li>
               

            <li class="nav-item" id="search-navbar">
                <img src="{{ getImageIcon('search') }}" class="icon" />
                <input type="text" name="term" class="form-control" placeholder="Search for resouces and help">
            </li>
           
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}"> Home </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('learner.courses.index') }}"> Courses </a>
            </li>

            
            @auth

            <li class="nav-item dropdown">
                <a id="user-profile" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="{{ Auth::user()->avatar}}" class="avatar">
                        <span> {{ Auth::user()->name }} </span>
                        <img src="{{ getImageIcon('down-arrow') }}" class="dropdown">
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/profile') }}"> Profile </a>
                    <a class="dropdown-item" href="{{ url('/logout') }}"> Logout </a>
                </div>
            </li>

            @endauth
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">FRIENDS REQUESTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


