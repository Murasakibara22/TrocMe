@extends('dash/layout/app')

@section('content')


@if ( session('Notedit'))
  <div class="alert alert-danger">
   Non sauvegarder
  </div>

@endif



<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nouvelle</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> <a href="/Categorie_list"><button type="button" class="btn btn-outline-info rounded-pill me-3"><i class="uil-circuit"></i>Retour</button> </a> Listes des Categories </h4>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        

                        <table class="table table-sm table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nom de la sous Categorie</th>
                                                <th>Creer le</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($SousCatItem as $SousCatItems)
                                            <tr>
                                                <td>{{$SousCatItems->nomSous}}</td>

                                                <td>{{ date('j M, Y', strtotime($SousCatItems->date) ) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>

                

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
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