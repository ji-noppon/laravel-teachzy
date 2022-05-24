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
    <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
      {{ __('Edit Student Room 6/4') }}
    </h1>
  </x-slot>

  <body>
    <br>
    <div class="container">
      <div class="row">
          <div class ="col-sm-4">

          </div>
          <div class="col-sm-4">
            <form action="{{url('/student/update/'.$studentById -> id)}}" method="post">
              @csrf
              <div class="form-group">
                <div class="mb-3 row">
                  <label for="" class="col-sm-4 col-form-label">FirstName</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="firstname" value ="{{$studentById -> firstname}}">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="" class="col-sm-4 col-form-label">LastName</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="lastname" value ="{{$studentById -> lastname}}">
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="" class="col-sm-4 col-form-label">No</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="no" min="1" max="50" value ="{{$studentById -> no}}">
                  </div>
                </div>

                <div class="col text-center" style="float: right"> {{-- text-center put in class --}}
                  <button type="button" class="btn btn-success ">
                    <input type="submit" class="text-light" value="Update Student"></input>
                  </button>
                </div>

              </div>
              <br><br>
              {{-- <h2 class = "font-semibold ">status</h2> --}}
              @error ('firstname')
              <p style="color: red">* {{ $message }}</p>
              @enderror

              @error ('lastname')
              <p style="color: red">* {{ $message }}</p>
              @enderror

              @error ('no')
              <p style="color: red">* {{ $message }}</p>
              @enderror

            </form>

            @if(session("success"))
            <div class="alert alert-success" role="alert">
              {{session('success')}}
            </div>
            @endif

          </div>

      </div> <!-- row -->
    </div> <!-- container -->
  </body>

</x-app-layout>

</html>