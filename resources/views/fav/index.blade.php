@extends('layout.layout')
@section('content')
    <main>

      <div
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>المفضلة</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="index.html">الرئيسية</a> /
            <span class="text-gray">المفضلة</span>
          </div>
        </div>
      </div>
      @if(session()->has('message'))
      <div class="alert alert-success" id="alert">

          {{ session()->get('message') }}
      </div>
          <script type="text/javascript">
          document.ready(setTimeout(function(){
              document.getElementById('alert').remove()
          },3000))
          </script>
      @endif
      <div class="my-5 py-5">
        <section class="section-container favourites">
          <table class="w-100">
            <thead>
              <th class="d-none d-md-table-cell"></th>
              <th class="d-none d-md-table-cell"></th>
              <th class="d-none d-md-table-cell">الاسم</th>
              <th class="d-none d-md-table-cell">السعر</th>
              <th class="d-none d-md-table-cell">المخزون</th>
              <th class="d-table-cell d-md-none">product</th>
            </thead>
            <tbody class="text-center">
             @forelse ($favs as $fav)

             <tr>
             <td class="d-block d-md-table-cell">
                <a class="text-muted" href="{{ route('fav.remove',$fav[0]->id) }}">

                    <span class="favourites__remove m-auto">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </a>
             </td>
             <td class="d-block d-md-table-cell favourites__img">
                {{-- @dd($fav[0]) --}}
               <img src="{{$fav[0]->image[0]=='h' ? $fav[0]->image : asset('uplode/Book') . '/' . $fav[0]->image   }}" alt="" />
             </td>
             <td class="d-block d-md-table-cell">
               <a href=""> {{ $fav[0]->name }} </a>
             </td>
             <td class="d-block d-md-table-cell">
               <span class="product__price product__price--old"
                 >{{ $fav[0]->price }} جنية</span
               >
               <span class="product__price">{{ $fav[0]->price_after_discount }} جنية</span>
             </td>
             <td class="d-block d-md-table-cell">
               <span class="me-2"><i class="fa-solid fa-check"></i></span>
               <span class="d-inline-block d-md-none d-lg-inline-block"
                 >متوفر بالمخزون</span
               >
             </td>
           </tr>
             @empty
<h2>No Item</h2>
             @endforelse
              {{-- <tr>
                <td class="d-block d-md-table-cell">
                  <span class="favourites__remove m-auto">
                    <i class="fa-solid fa-xmark"></i>
                  </span>
                </td>
                <td class="d-block d-md-table-cell favourites__img">
                  <img src="assets/images/product-1.webp" alt="" />
                </td>
                <td class="d-block d-md-table-cell">
                  <a href=""> Flutter Apprentice </a>
                </td>
                <td class="d-block d-md-table-cell">
                  <span class="product__price product__price--old"
                    >550 جنية</span
                  >
                  <span class="product__price">350 جنية</span>
                </td>
                <td class="d-block d-md-table-cell">يوليو 24, 2023</td>
                <td class="d-block d-md-table-cell">
                  <span class="me-2"><i class="fa-solid fa-check"></i></span>
                  <span class="d-inline-block d-md-none d-lg-inline-block"
                    >متوفر بالمخزون</span
                  >
                </td>
              </tr> --}}
            </tbody>
          </table>
        </section>
      </div>
    </main>

    @endsection
