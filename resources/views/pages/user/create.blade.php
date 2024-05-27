@extends('welcome')

@section('body')
    <main class="container mt-3">
        <h3 class="text-center">Creer un utilisateur</h3>
        <section class="row d-flex justify-content-center">
            <div class="col-lg-7">
                <a href="{{route('user.show')}}" class="btn btn-outline-dark">
                <i class="fa fa-home"></i>
                Home Page
            </a>
            <form class="mt-3" method="POST" action="{{route("user.create")}}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nom..." value="{{old("nom")}}" name="nom">
                    @error('nom')
                     <span class="text-danger">{{$message}}</span>   
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Email..." value="{{old("email")}}" name="email">
                    @error('email')
                     <span class="text-danger">{{$message}}</span>   
                    @enderror
                </div>
                <div class="mb-3">
                    <select name="pays" id="pays" class="form-select">
                        <option value="Cameroun">Cameroun</option>
                        <option value="Togo">Togo</option>
                        <option value="Mali">Mali</option>
                        <option value="Tchad">Tchad</option>
                    </select>
                    @error('pays')
                     <span class="text-danger">{{$message}}</span>   
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Ville..." value="{{old("ville")}}" name="ville">
                    @error('ville')
                     <span class="text-danger">{{$message}}</span>   
                    @enderror
                </div>
                <button type="submit" class="w-100 btn btn-outline-dark">
                    Creer
                </button>
            </form>
            </div>
        </section>
    </main>
@endsection