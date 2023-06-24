
                        {{-- <html> --}}
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Form Payment</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

                                <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>


                                <style>::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                 
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');*{margin: 0;padding: 0;box-sizing: border-box;list-style: none;font-family: 'Montserrat', sans-serif}body{padding: 5px}p{margin: 0%}.container{max-width: 900px;margin: 20px auto;overflow: hidden}.box-1{max-width: 450px;padding: 10px 40px;user-select: none}.box-1 img.pic{width: 20px;height: 20px;object-fit: cover}.box-1 img.mobile-pic{width: 100%;height: 200px;object-fit: cover}.box-1 .name{font-size: 11px;font-weight: 600}.dis{font-size: 12px;font-weight: 500}.box-2{max-width: 450px;padding: 10px 40px}.box-2 .box-inner-2 input.form-control{font-size: 12px;font-weight: 600}.box-2 .box-inner-2 .inputWithIcon{position: relative}.box-2 .box-inner-2 .inputWithIcon span{position: absolute;left: 15px;top: 8px}.box-2 .box-inner-2 .inputWithcheck{position: relative}.box-2 .box-inner-2 .inputWithcheck span{position: absolute;width: 20px;height: 20px;border-radius: 50%;background-color: green;font-size: 12px;color: white;display: flex;justify-content: center;align-items: center;right: 15px;top: 6px}.form-control:focus, .form-select:focus{box-shadow: none;outline: none;border: 1px solid #7700ff}.border:focus-within{border: 1px solid #7700ff !important}.box-2 .card-atm .form-control{border: none;box-shadow: none}.form-select{border-radius: 0;border-top-left-radius: 10px;border-top-right-radius: 10px}.address .form-control.zip{border-radius: 0;border-bottom-left-radius: 10px}.address .form-control.state{border-radius: 0;border-bottom-right-radius: 10px}.box-2 .box-inner-2 .btn.btn-outline-primary{width: 120px;padding: 10px;font-size: 11px;padding: 0% !important;display: flex;align-items: center;border: none;border-radius: 0;background-color: whitesmoke;color: black;font-weight: 600}.box-2 .box-inner-2 .btn.btn-primary{background-color: #7700ff;color: whitesmoke;font-size: 14px;display: flex;align-items: center;font-weight: 600;justify-content: center;border: none;padding: 10px}.box-2 .box-inner-2 .btn.btn-primary:hover{background-color: #7a34ca}.box-2 .box-inner-2 .btn.btn-primary .fas{font-size: 13px !important;color: whitesmoke}.carousel-indicators [data-bs-target]{width: 10px;height: 10px;border-radius: 50%}.carousel-inner{width: 100%;height: 200px}.carousel-item img{object-fit: cover;height: 100%}.carousel-control-prev{transform: translateX(-50%);opacity: 1}.carousel-control-prev:hover .fas.fa-arrow-left{transform: translateX(-5px)}.carousel-control-next{transform: translateX(50%);opacity: 1}.carousel-control-next:hover .fas.fa-arrow-right{transform: translateX(5px)}.fas.fa-arrow-left, .fas.fa-arrow-right{font-size: 0.8rem;transition: all .2s ease}.icon{width: 30px;height: 30px;background-color: #f8f9fa;color: black;display: flex;align-items: center;justify-content: center;border-radius: 50%;transform-origin: center;opacity: 1}.fas.fa-times{color: red}.fas, .fab{color: #6d6c6d}::placeholder{font-size: 12px}.couponCode{text-transform: uppercase;font-size: 0.7rem}#code{pointer-events: none;font-weight: 600}.close{cursor: pointer}.info{transform: translateX(-500px);animation: moving 1.5s;animation-fill-mode: forwards}.updates{transform: translateX(-500px);animation: moving 1.7s;animation-fill-mode: forwards}.different{transform: translateX(-500px);animation: moving 1.9s;animation-fill-mode: forwards}.black{transform: translateX(-500px);animation: moving 2.1s;animation-fill-mode: forwards}.white{transform: translateX(-500px);animation: moving 2.3s;animation-fill-mode: forwards}.pastel{transform: translateX(-500px);animation: moving 2.5s;animation-fill-mode: forwards}.footer{transform: translateX(-500px);animation: moving 2.6s;animation-fill-mode: forwards}@keyframes moving{0%{opacity: 0;transform: translateX(-500px)}100%{opacity: 1;transform: translateX(0px)}}.box-2{transform: translateY(-500px);animation: img-top 2.5s;animation-fill-mode: forwards}.user{transform: translateY(-500px);animation: img-top 2.5s;animation-fill-mode: forwards}.userdetails{transform: translateY(-500px);animation: img-top 2.0s;animation-fill-mode: forwards}.imgdetails{transform: translateY(-500px);animation: img-top 1.5s;animation-fill-mode: forwards}@keyframes img-top{0%{opacity: 0;transform: translateY(-500px)}100%{opacity: 1;transform: translateY(0px)}}@media (max-width:768px){.container{max-width: 700px;margin: 10px auto}.box-1, .box-2{max-width: 600px;padding: 20px 90px;margin: 20px auto}.box-2{transform: translateX(-500px);animation: box-side 2.6s;animation-fill-mode: forwards}@keyframes box-side{0%{opacity: 0;transform: translateX(-500px)}100%{opacity: 1;transform: translateX(0px)}}}@media (max-width:426px){.box-1, .box-2{max-width: 400px;padding: 20px 10px}::placeholder{font-size: 9px}}</style>
                                </head>
                                <body className='snippet-body'>
                                <div class="container d-lg-flex"> <div class="box-1 bg-light user"> <div class="box-inner-1 pb-3 mb-3 "> <div class="d-flex justify-content-between mb-3 userdetails"> <p class="fw-bold">{{$paymenttype->payment_name}}</p></div> 
                                    <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel" data-bs-interval="2000"> <div class="carousel-indicators"> <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <button type="button" data-bs-target="#my" data-bs-slide-to="1" aria-label="Slide 2"></button> <button type="button" data-bs-target="#my" data-bs-slide-to="2" aria-label="Slide 3"></button> </div> 
                                    <div class="carousel-inner" style="height: 280px"> 
                                    <div class="carousel-item active" > 
                                        <img src="{{asset('image_pmnt/'.$paymenttype->payment_image)}}" style="max-width: 100%" class="d-block"> 
                                    </div> 
                                    {{-- <div class="carousel-item active"> 
                                        <img src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="d-block w-100"> 
                                    </div> 
                                    <div class="carousel-item"> 
                                        <img src="https://images.pexels.com/photos/270694/pexels-photo-270694.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100"> 
                                    </div> 
                                    <div class="carousel-item"> 
                                        <img src="https://images.pexels.com/photos/7974/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100"> 
                                    </div>  --}}
                                </div> 
                                    <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev"> <div class="icon"> <span class="fas fa-arrow-left"></span> </div> <span class="visually-hidden">Previous</span> </button> <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next"> <div class="icon"> <span class="fas fa-arrow-right"></span> </div> <span class="visually-hidden">Next</span> </button> </div> <p class="dis my-3 info">{!!$paymenttype->payment_desc!!} </p><p class="dis mb-3 different">Berikut adalah tahapan "{{$paymenttype->payment_name}}"</p> 
                                    <div class="dis" > 
                                        <p class="black" style="margin-bottom: 10px"><span class="fas fa-check" style="color: green"></span> Pengisian Form Pendaftaran</p> 
                                        <p class="white"><span class="fas fa-arrow-right mb-3 pe-2"></span>Lakukan pembayaran sesuai metode</p> 
                                        <p class="pastel"><span class="fas fa-arrow-right mb-3 pe-2"></span>Pembayaran terferifikasi secara otomatis</p> </div> <div> </div> </div> </div> <div class="box-2"> 
                                    <div class="box-inner-2"> 
                                        <div> 
                                            <p class="fw-bold">{{$paymenttype->payment_name}}</p> 
                                            <p class="dis mb-3">Pendaftaran belum selesai. Lakukan pembayaran terlebih dahulu</p> 
                                        </div> 
                                        <form > @csrf
                                            <div class="mb-3"> 
                                                <p class="dis fw-bold mb-2">Nama lengkap</p> 
                                                <input class="form-control text-uppercase" name="transaksi1_name" value="{{$transaksi1->transaksi1_name}}" type="text" disabled> 
                                            </div>  
                                            
                                            <div class="d-flex flex-column dis"> 
                                                    <input id="pay-button" class="btn btn-success mt-2" value="BAYAR SEKARANG"> 
                                                </div> 
                                            </div> 
                                            </div>
                                        </form> 
                                        </div> 
                                    </div>
                                </div>
                                
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');

    payButton.addEventListener('click',function () {
        window.snap.pay('{{$snapToken}}', {
            onSuccess:function(result) {
                // alert("payment success!");
                // console.log(result)
                swal({
                    title: "SUCCESS!",
                    text: "payment success!",
                    type: "success",
                    timer: 2000,
                });
            },
            onPending: function (result) {
                // alert("waiting your payment");
                // console.log(result)
                swal({
                    title: "SUCCESS!",
                    text: "waiting your payment",
                    type: "success",
                    timer: 2000,
                });
            },
            onError: function (result) {
                // alert("payment failed");
                // console.log(result);
                swal({
                    title: "SUCCESS!",
                    text: "payment failed",
                    type: "success",
                    timer: 2000,
                });
            },
            onClose: function () {
                swal({
                    title: "SUCCESS!",
                    text: "menutup pembayaran sebelum menyelesaikan pembayaran",
                    type: "success",
                    timer: 2000,
                });
                // alert('menutup pembayaran sebelum menyelesaikan pembayaran');
            }
        })
    })
</script>

<script>
    // $('#formadd').submit(function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     $.ajax({
    //         type: 'POST',
    //         url: "/transaksi1",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function() {
    //             $('#btnadd').attr('disabled', 'disabled');
    //             $('#btnadd').val('Process...');
    //         },
    //         success: function(response) {
    //             if (response.status == 200) {
    //                 $("#formadd")[0].reset();
    //                 $('#btnadd').val('Submit');
    //                 $('#btnadd').attr('disabled', false);
    //                 toastr.success(response.message);
    //                 swal({
    //                     title: "SUCCESS!",
    //                     text: response.message,
    //                     type: "success",
    //                     timer: 2000,
    //                 }).then(okay => {
    //                     if (okay) {
    //                         window.location.href = "/admin-payment-type";
    //                     }
    //                 });
    //             } else {
    //                 $('#btnadd').val('SUBMIT!');
    //                 $('#btnadd').attr('disabled', false);
    //                 toastr.error(response.message);
    //                 $('#errList').html("");
    //                 $('#errList').addClass('alert alert-danger');
    //                 $.each(response.errors, function(key, err_values) {
    //                     $('#errList').append('<div>' + err_values + '</div>');
    //                 });
    //             }
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         }
    //     });
    // });
</script>
                            
</body>
                            {{-- </html> --}}