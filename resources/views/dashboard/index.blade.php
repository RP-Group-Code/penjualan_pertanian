@extends('layout.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="content pt-5">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card card-purple">
                            <div class="card-header">
                                <h3 class="card-title">All together</h3>
                                <div class="card-tools">
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="margin: -1rem !important; padding: -lrem !important;">
                                <div class="info-box shadow-none" style="margin-bottom: 0.1rem !important;">
                                    <i class="fa-solid fa-user"
                                        style="font-size: 4rem; padding: 0; margin: 0; color: #4f98eb"></i>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> <b> Jumlah Users </b></span>
                                        <span class="info-box-text">{{ $users }} Pengguna Aktive</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-orange">
                            <div class="card-header">
                                <h3 class="card-title">All together</h3>
                                <div class="card-tools">
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="margin: -1rem !important; padding: -lrem !important;">
                                <div class="info-box shadow-none" style="margin-bottom: 0.1rem !important;">
                                    <i class="fa-solid fa-cart-shopping"
                                        style="font-size: 4rem; padding: 0; margin: 0; color: #4f98eb"></i>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> <b> Pembelian History </b></span>
                                        <span class="info-box-text">{{ $users }} Pengguna Aktive</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">All together</h3>
                                <div class="card-tools">
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="margin: -1rem !important; padding: -lrem !important;">
                                <div class="info-box shadow-none" style="margin-bottom: 0.1rem !important;">
                                    <i class="fa-solid fa-money-bill-1-wave"
                                        style="font-size: 4rem; padding: 0; margin: 0; color: #4f98eb"></i>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> <b> Item Penjualan </b></span>
                                        <span class="info-box-text">{{ $users }} Pengguna Aktive</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">All together</h3>
                                <div class="card-tools">
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="margin: -1rem !important; padding: -lrem !important;">
                                <div class="info-box shadow-none" style="margin-bottom: 0.1rem !important;">
                                    <i class="fa-solid fa-credit-card"
                                        style="font-size: 4rem; padding: 0; margin: 0; color: #4f98eb"></i>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> <b> Credit Transaksi </b></span>
                                        <span class="info-box-text">{{ $users }} Pengguna Aktive</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="visible-print text-center">

                        {{-- <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->merge(public_path('RP_1.png'), 0.3, true)->generate(
                            $barangsatuan
                        ))}}" alt=""> --}}
                        {{-- {!! QrCode::size(100)->generate(Request::url()); !!} --}}
                        {{-- {!! QrCode::size(300)->generate($barangsatuan) !!}
                        {!! QrCode::size(100)->generate('https://bit.ly/3Nukc9n') !!} --}}
                    </div>

                </div>
            </div>
        </div>

        <br>
        <br>
        {{-- <div class="container-fluid">
            <div class="text-center">

                <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
                    class="qr-code img-thumbnail img-responsive" />
            </div>

            <div class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="content">
                        Content:
                    </label>
                    <div class="col-sm-10">

                        <!-- Input box to enter the
                                      required data -->
                        <input type="text" size="60" maxlength="60" class="form-control" id="content"
                            placeholder="Enter content" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                        <!-- Button to generate QR Code for
                                   the entered data -->
                        <button type="button" class="btn btn-default" id="generate">
                            Create QR
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script>
            // Function to HTML encode the text
            // This creates a new hidden element,
            // inserts the given text into it
            // and outputs it out as HTML
            function htmlEncode(value) {
                return $('<div/>').text(value)
                    .html();
            }

            $(function() {

                // Specify an onclick function
                // for the generate button
                $('#generate').click(function() {

                    // Generate the link that would be
                    // used to generate the QR Code
                    // with the given data
                    let finalURL =
                        'https://chart.googleapis.com/chart?cht=qr&chl=' +
                        htmlEncode($('#content').val()) +
                        '&chs=160x160&chld=L|0'

                    // Replace the src of the image with
                    // the QR code image
                    $('.qr-code').attr('src', finalURL);
                });
            });
        </script>

    </body>

    </html>
@endsection

@push('script')
@endpush
