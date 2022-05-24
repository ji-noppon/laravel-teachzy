<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teachzy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Student List') }}
    </h2>
  </x-slot>

  <body>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 ">
          <h2 style="font-weight:bold;">Room : 6/4</h2>
        </div>
        <div class="col-sm-3">
          <h4 class="text-center">Add Student</h4>
        </div>
        <div class="row">
          <div class="col-sm-9">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">Lastname</th>
                  <th scope="col">Create_at</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>

              <tbody>
                
                @foreach ($students as $student)
                <tr>
                  <th>{{$student -> no}}</th>
                  <td>{{$student -> firstname}}</td>
                  <td>{{$student -> lastname}}</td>
                  <td>{{$student -> created_at}}</td>
                  <td>
                    <a href="{{url('/student/edit/'.$student->id)}}"><i class="bi bi-pencil btn btn-primary"></i></a>
                        &nbsp;
                    <a href="{{url('/student/delete/'.$student->id)}}"><i class="bi bi-trash btn btn-danger"></i></a>
                  </td>
                </tr>
                @endforeach

              </tbody>

            </table>
          </div>

          <div class="col-sm-3">
            <form action="{{route('studentAdd')}}" method="post">
              @csrf
              <div class="form-group">
                <div class="mb-3 row">
                  <label for="" class="col-sm-4 col-form-label">FirstName</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="firstname">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="" class="col-sm-4 col-form-label">LastName</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="lastname">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="" class="col-sm-4 col-form-label">No</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="no" min="1" max="50">
                  </div>
                </div>

                <div class="col" style="float: right"> {{-- text-center put in class --}}
                  <button type="button" class="btn btn-success ">
                    <input type="submit" class="text-light" value="Add Student"></input>
                  </button>
                </div>

              </div>
              <br><br>

              @error ('firstname')
              <p>{{ $message }}</p>
              @enderror

              @error ('lastname')
              <p>{{ $message }}</p>
              @enderror

              @error ('no')
              <p>{{ $message }}</p>
              @enderror

            </form>

            @if(session("success"))
            <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
            @endif

          </div>
        </div>

      </div> <!-- row -->
    </div> <!-- container -->
  </body>

</x-app-layout>

</html>