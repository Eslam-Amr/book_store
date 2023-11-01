@extends('layout.layout')
@section('content')

<main>
    <section
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>إتمام الطلب</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">إتمام الطلب</span>
        </div>
      </div>
    </section>

    <section class="section-container my-5 py-5 d-lg-flex">
      <div class="checkout__form-cont w-50 px-3 mb-5">
        <h4>الفاتورة </h4>
        <form class="checkout__form" action="{{ route('order.done') }}">
          <div class="d-flex gap-3 mb-3">

          </div>
          <div class="mb-3">
            <label for="last-name"
              >المدينة / المحافظة<span class="required">*</span></label
            >
            <select
            name="governorate"
              class="form__input bg-transparent"
              type="text"
              id="last-name"
            >
              <option value="cairo">القاهرة</option>
              <option value="alex">اسكندرية</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="last-name"
              >العنوان بالكامل ( المنطقة -الشارع - رقم المنزل)<span
                class="required"
                >*</span
              ></label
            >
            <input
            name="address"
              class="form__input"
              placeholder="رقم المنزل او الشارع / الحي"
              type="text"
              id="last-name"
            />
          </div>
          <div class="mb-3">
            <label for="last-name"
              >رقم الهاتف<span class="required">*</span></label
            >
            <input name="phone" class="form__input" type="text" id="last-name" />
          </div>
          <div class="mb-3">
            <label for="last-name"
              >البريد الإلكتروني (اختياري)<span class="required"
                >*</span
              ></label
            >
            <input name="email" class="form__input" type="text" id="last-name" />
          </div>
          <div class="mb-3">
            <h2>معلومات اضافية</h2>
            <label for="last-name"
              >ملاحظات الطلب (اختياري)<span class="required">*</span></label
            >
            <textarea
            name="notes"
              class="form__input"
              placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب."
              type="text"
              id="last-name"
            ></textarea>
          </div>
          <button class="primary-button w-100 py-2">تاكيد الطلب</button>
        </form>
      </div>
      <div class="checkout__order-details-cont w-50 px-3">
        <h4>طلبك</h4>
        <div>
          <table class="w-100 checkout__table">
            <thead>
              <tr class="border-0">
                <th>المنتج</th>
                <th>المجموع</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $totalAfterDiscount=0;
                    $totalBeforeDiscount=0;
                    ?>
                @for ($i=0;$i<count($products);$i++)
{{-- @dd($cartItem) --}}
                <tr>
                    <td>{{ $products[$i][0]->name }} × {{ $cartItem[$i]['quantity'] }}</td>
                    <td>
                        <div
                        class="product__price text-center d-flex gap-2 flex-wrap"
                        >
                        <span class="product__price product__price--old">
                            <?php  $totalAfterDiscount+=$products[$i][0]->price * $cartItem[$i]['quantity']; ?>
                            {{ $products[$i][0]->price * $cartItem[$i]['quantity'] }} جنيه
                        </span>
                        <?php  $totalBeforeDiscount+=$products[$i][0]->price_after_discount * $cartItem[$i]['quantity']; ?>

                        <span class="product__price"> {{ $products[$i][0]->price_after_discount * $cartItem[$i]['quantity'] }}جنيه </span>
                    </div>
                </td>
            </tr>
            @endfor
              {{-- <tr>
                <td>كوتش كاجوال -رجالى - بنى, 43 × 1</td>
                <td>
                  <div
                    class="product__price text-center d-flex gap-2 flex-wrap"
                  >
                    <span class="product__price product__price--old">
                      300.00 جنيه
                    </span>
                    <span class="product__price"> 150.00 جنيه </span>
                  </div>
                </td>
              </tr> --}}
              <tr>
                <th>المجموع</th>
                <td class="fw-bolder"><?= $totalAfterDiscount ?> جنيه</td>
              </tr>
              <tr class="bg-green">
                <th>قمت بتوفير</th>
                <td class="fw-bolder"><?= $totalAfterDiscount-$totalBeforeDiscount ?> جنيه</td>
              </tr>
              <tr>
                <th>الإجمالي</th>
                <td class="fw-bolder"><?= $totalAfterDiscount ?> جنيه</td>
              </tr>
            </tbody>
          </table>
        </div>


        <div class="checkout__payment py-3 px-4 mb-3">
          <p class="m-0 fw-bolder">الدفع نقدا عند الاستلام</p>
        </div>

        <p>الدفع عند التسليم مباشرة.</p>
      </div>
    </section>
  </main>
@endsection
