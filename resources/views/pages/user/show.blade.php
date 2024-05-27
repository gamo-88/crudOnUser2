@extends('welcome')

@section('body')
    <main class="container mt-3">
        <h3 class="text-center">Tous Les Utilisateurs</h3>
        <section class="row d-flex justify-content-center mt-3">
            <div class="col-lg-8">
                <a href="{{route("user.create")}}" class="btn btn-outline-dark">
                    <i class="fa fa-user"></i>
                    Creer un utilisateur
                </a>
                <form method="GET" action="{{route('user.search')}}">
                  @csrf
                  <div class="input-group my-3">
                    <input type="search" name="search" class="form-control search" placeholder="Entrer le nom de l'utilisateur">
                    <button disabled class="btn btn-outline-secondary" type="submit" id="button-addon2">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </form>
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Pays</th>
                                <th>Ville</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                              <tr>
                               <td>{{$user->name}}</td> 
                               <td>{{$user->email}}</td> 
                               <td>{{$user->pays}}</td> 
                               <td>{{$user->ville}}</td> 
                               <td>
                                <a href="{{route("user.update", ['id'=>$user->id])}}" class="text-decoration-none" >
                                  <i class="fa fa-edit me-1"></i>
                                </a>
                                <span role="button" data-bs-toggle="modal" data-bs-target="#e{{$user->id}}">
                                    <i class="fa fa-trash text-danger"></i>
                                </span>
                               </td>
                            </tr>
                            <div class="modal fade" id="e{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <span>Voulez-vous vraiment supprimer <strong>{{$user->name}}</strong>?</span>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                      <a href="{{route("user.delete", ['id'=>$user->id])}}"  class="btn btn-danger">Oui</a>
                                    </div>
                                  </div>
                                </div>
                              </div>  
                            @empty
                               <p class="display-6">No User</p> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>

        </section>
    </main>
@endsection