@extends('dash/layout/app')

@section('content')


 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                
                    @if ( session('NotExist'))
                    <div class="alert alert-dansger">
                    L'utilisateur selectionner n'existe pas , si le probleme persiste veuillez rafraichir votre page
                    </div>

                    @endif
                    @if ( session('ModifySccuessequipe'))
                    <div class="alert alert-warning">
                    les informations de l'utilisateur ont ete modifier avec succes
                    </div>

                    @endif
                    @if ( session('SupprimerAvecSuccess'))
                    <div class="alert alert-success">
                    L'utilisateur selectionner a ete supprimer avec success
                    </div>

                    @endif

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <li><a href="/new_equipe"><button type="button" class="btn btn-outline-info rounded-pill ms-5"><i class="uil-circuit"></i> Ajoutez un membre</button> </a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Listes des membres</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
                       

                        <div class="row">

                            <div class="app-search dropdown">
                                <form action="{{ route('findSearchTeam') }}">
                                    <div class="input-group">
                                        <input type="search" name= "search" value="{{  request()->search ?? '' }}"  class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                        <span class="mdi mdi-magnify search-icon"></span>
                                        
                                
                                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>


                            <div class="table-responsive col-lg-10 m-auto">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Fonctions</th>
                                            <th>Account No.</th>
                                            <th>Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($equipe && $equipe->count() > 0)
                                        @foreach($equipe as $item)
                                        <tr>
                                            <td class="table-user">
                                                <img src="/images/Equipe/{{$item->photo}}" alt="table-user" class="me-2 rounded-circle" />
                                                {{$item->nom}} {{$item->prenom}}
                                            </td>
                                            <td>{{$item->fonction}}</td>
                                            <td>{{$item->contact}}</td>
                                            <td>{{$item->email}}</td>
                                            <td class="table-action">
                                                <a href="/equipe_edit/{{$item->slug}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                <a href="/equipe_delete/{{$item->slug}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                                        
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © IC-DIGITALTRANS
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

@endsection