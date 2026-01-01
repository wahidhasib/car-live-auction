@extends('frontend.layout.master')

@section('title')
    Emi Calculator
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('storage/' . $settings->common_banner) }})">
        <div class="container">
            <h2 class="breadcrumb-title">Calculator</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Calculator</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- calculator -->
    <div class="calculator py-120">
        <div class="container">
            <div class="calculator-wrapper">
                <h4>Emi Calculator</h4>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="calculator-form">
                            <div id="error-messages" class="">

                            </div>
                            <form action="#" id="emi-form">
                                @csrf
                                <div class="form-group">
                                    <input type="number" name="price" id="price" step="any"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="৳ Price">
                                    @error('price')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" id="rate" step="any"
                                                class="form-control @error('rate') is-invalid @enderror" name="rate"
                                                placeholder="% Rate">
                                            @error('rate')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" min="1"
                                                class="form-control @error('period') is-invalid @enderror" name="period"
                                                id="period" step="any" placeholder="Month">
                                            @error('period')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="down_payment" step="any"
                                        class="form-control @error('down_payment') is-invalid @enderror" id="down_payment"
                                        placeholder="৳ Down Payment">
                                </div>
                                <button type="submit" class="theme-btn" id="calculate-btn">Calculate Now<i
                                        class="fas fa-arrow-right-long"></i></button>
                            </form>
                        </div>
                        <div id="emi-result" class="mt-3"></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="calculator-img">
                            <img src="{{ asset('frontend/img/calculator/calculator.png') }}" alt="calculator img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- calculator end -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#emi-form").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: "/calculate-emi",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {

                        $("#error-messages").html(""); // Clear previous errors

                        $("#emi-result").html(`
                    <h4> EMI: ${response.emi}</h4>
                    <p>Loan Amount: ${response.loan_amount}</p>
                    <p>Total Payable: ${response.total_payable}</p>
                    <p>Total Interest: ${response.total_interest}</p>
                `);
                    },

                    error: function(xhr) {
                        $("#emi-result").html(""); // Clear previous calculation

                        // Laravel 422 validation errors
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = `<div class="alert alert-danger"><ul>`;

                            $.each(errors, function(key, value) {
                                errorHtml += `<li>${value[0]}</li>`;
                            });

                            errorHtml += `</ul></div>`;

                            $("#error-messages").html(errorHtml);
                        }
                    }
                });

            });
        });
    </script>
@endpush
