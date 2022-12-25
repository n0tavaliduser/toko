@extends('layouts.frontend')

@section('title', '')

@section('content')
<div class="breacrumb-section">
    @php
        if ($status === "0") { 
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<strong>Voucher : </strong> voucher tidak ditemukan.';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
        }elseif ($status === "1") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo '<strong>Voucher : </strong> voucher ditemukan.';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
        }elseif ($status === "2") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
            echo '<strong>Voucher : </strong> Voucer mungkin belum aktif.';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
        }
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>History</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<!-- Faq Section Begin -->
<div class="faq-section spad"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-lg-12"> 
                <div class="faq-accordin">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-heading active">
                                <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                    Leave a Comment
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="contact-form">
                                            <div class="leave-comment"> 
                                                <p>Give me your opinion about our product.</p>
                                                <form action="{{ route('add-comment') }}" class="comment-form" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <select name="id_barang" class="sorting">
                                                            @foreach ($transaksi as $index => $transaksis)
                                                                <option value="<?= $transaksis->id_barang ?>">Transaction <?= $transaksis->created_at ?></option>
                                                            @endforeach
                                                            </select>
                                                        </div> 
                                                        <div class="col-lg-12">
                                                            <textarea placeholder="Your message" name="komentar"></textarea>
                                                            <input type="submit" class="site-btn" value="Send message">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseTwo">
                                    Transaction History
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                <div class="card-body">
                                    @foreach ($transaksi as $index => $transaksi)
                                        <p><a href="{{ route('product-invoice', $transaksi->id) }}">Transaction {{ $transaksi->created_at }}</a></p>
                                    @endforeach
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->
@endsection