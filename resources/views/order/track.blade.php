@extends('layout.layout')
@section('content')

<main>
    {{-- @dd($order,$orders) --}}
    <section
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>حسابي</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">حسابي</span>
        </div>
      </div>
    </section>

    <section class="section-container profile my-5 py-5">
      <div class="text-center mb-5">
        <div class="success-gif m-auto">
          <img class="w-100" src="assets/images/success.gif" alt="" />
        </div>
        <h4 class="mb-4">جاري تجهيز طلبك الآن</h4>
        <p class="mb-1">
          سيقوم أحد ممثلي خدمة العملاء بالتواصل معك لتأكيد الطلب
        </p>
        <p>برجاء الرد على الأرقام الغير مسجلة</p>
        <button class="primary-button">تصفح منتجات اخري</button>
      </div>
      <div>
        <p>شكرًا لك. تم استلام طلبك.</p>
        <div class="d-flex flex-wrap gap-2">
          <div class="success__details">
            <p class="success__small">رقم الطلب:</p>
            <p class="fw-bolder">79917</p>
          </div>
          <div class="success__details">
            <p class="success__small">التاريخ:</p>
            <p class="fw-bolder">يوليو 26, 2023</p>
          </div>
          <div class="success__details">
            <p class="success__small">البريد الإلكتروني:</p>
            <p class="fw-bolder">moamenyt@gmail.com</p>
          </div>
          <div class="success__details">
            <p class="success__small">الإجمالي:</p>
            <p class="fw-bolder">389.00 جنيه</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-container">
      <h2>تفاصيل الطلب</h2>
      <table class="success__table w-100 mb-5">
        <thead>
          <tr class="border-0 bg-main text-white">
            <th>المنتج</th>
            <th class="d-none d-md-table-cell">الإجمالي</th>
          </tr>
        </thead>
        <tbody>
            @for ($i=0;$i<count($products);$i++)
            @dump($products[$i][0]->name)

            <tr>
              <td>
                <div>
                  <a href="">{{ $products[$i][0]->name }}</a> x {{ $orders[$i]->quantity }}
                </div>


              </td>
              <td>{{ $orders[$i]->price }} جنيه</td>
            </tr>
            @endfor
          {{-- <tr>
            <td>
              <div><a href="">كوتش كاجوال -رجالى - بنى, 43</a> x 1</div>
              <div>
                <span class="fw-bold">اللون:</span>
                <span>بني</span>
              </div>
              <div>
                <span class="fw-bold">المقاس:</span>
                <span>43</span>
              </div>
            </td>
            <td>150.00 جنيه</td>
          </tr>
          <tr>
            <th>المجموع:</th>
            <td class="fw-bolder">350.00 جنيه</td>
          </tr>
          <tr>
            <th>الإجمالي:</th>
            <td class="fw-bold">389.00 جنيه</td>
          </tr> --}}
        </tbody>
      </table>
    </section>
    <section class="section-container mb-5">
      <h2>عنوان الفاتورة</h2>
      <div class="border p-3 rounded-3">
        {{-- @dump(auth()->user()) --}}
        <p class="mb-1">{{ auth()->user()->user_name}}</p>
        <p class="mb-1">{{  $order->address  }}</p>
        <p class="mb-1">{{  $order->governorate  }}</p>
        <p class="mb-1">{{  $order->phone  }}</p>
        <p class="mb-1">{{  $order->email  }}</p>
      </div>
    </section>
  </main>
@endsection
