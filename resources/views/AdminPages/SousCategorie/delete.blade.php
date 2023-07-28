@extends('dash.layout.app')

@section('content')




 <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                <div class="container-fluid">

<form action="{{ url('/sousCategoriDelete/'.$SubCategory->slug) }}" method="POST">
    @csrf 
    @method('DELETE')

    <div class="alert alert-danger" role="alert">
  vous allez suprimer Cette Sous Categorie ? 
</div>

<div class="shadow-lg p-3 mb-5 bg-body rounded ms-5">Voulez vous vraiment suprimer cette Sous categorie ? ({{$SubCategory->libelle}})
<button type="submit"  class="btn btn-danger ">oui suprimer</button>
  
</div>
</form>



          </div>
        </div>
      </div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection