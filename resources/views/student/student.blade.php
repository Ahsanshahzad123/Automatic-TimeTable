<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Auto Timetable Generator  </title>
  </head>
  <body>
    <h1 class="text-center">Student Dashboard</h1>
    <h5 class="text-center">Wellcome {{$user->name}}</h5>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
   <!-- alerts  massage -->
   @include('layouts.alerts')
    <div class="container  ">
      <div class="row">
        <div class="col-12  p-2" style="border:1px solid gray">
          <div class="d-flex justify-content-between">
           <h3> Course</h3>
           <a href="{{ route('logout') }}" class="btn btn-danger float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
          </div>
           <table class="table mt-4">
             <thead>
               <tr>
                 <th scope="col">Name</th>
                 <th scope="col">Hours</th>
                 <th scope="col">From</th>
                 <th scope="col">To</th>
                 <th scope="col">Day</th>
                 <th scope="col">Register</th>
               </tr>
             </thead>
             <tbody>
               @foreach ($course as $courses)
               <tr>
                 <td>{{$courses->name}}</td>
                 <td>{{$courses->hours}}</td>
                 <td>{{$courses->from}}</td>
                 <td>{{$courses->to}}</td>
                 <td>{{$courses->day}}</td>
                 <td>    <a class="btn btn-primary" href="{{route('student.registerCourse',$courses->id)}}">Register</a></td>
               </tr>
           @endforeach
              
             
             </tbody>
           </table>
         </div>

         <div class="col-12  p-2 mt-4" style="border:1px solid gray">
          <div >
           <h3 class="text-center">Registered Courses</h3></div>
           <table class="table mt-4">
             <thead>
               <tr>
                 <th scope="col">Courses Name</th>
                 <th scope="col">Class Hours</th>
                 <th scope="col">Time From</th>
                 <th scope="col">Time To</th>
                 <th scope="col">Course Day</th>
               </tr>
             </thead>
             <tbody>
               @foreach ($user->courses as $users)
               <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->hours}}</td>
                <td>{{$users->from}}</td>
                <td>{{$users->to}}</td>
                <td>{{$users->day}}</td>
               </tr>
           @endforeach
              
             
             </tbody>
           </table>
         </div>
       
      </div>
     
    
    </div>


<div class="modal fade" id="Student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.student')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Student Name:</label>
            <input type="text" class="form-control" name="name"  id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="recipient-name">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>