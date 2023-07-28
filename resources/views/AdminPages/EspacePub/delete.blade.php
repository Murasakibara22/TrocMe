@extends('dash.layout.app')

@section('content')


<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">


                   <!-- Start Content-->
                   <div class="container-fluid">

                    <form action="{{ url('/espaccepubDelete/'.$espace->slug) }}" method="POST">
                        @csrf 
                        @method('DELETE')

                        <div class="alert alert-danger" role="alert">
                    vous allez suprimer {{$espace->titre}} ?
                    </div>

                    <div class="shadow-lg p-3 mb-5 bg-body rounded">Voulez vous vraiment suprimer Cette publicité
                    <button type="submit"  class="btn btn-danger ">oui suprimer</button>
                    <a href="{{ url('/espaccepub_list/') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">non fermer </button>  </a>  
                    </div>
                    </form>


                    </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <script>document.write(new Date().getFullYear())</script> © Troc Moi
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