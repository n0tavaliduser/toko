<html>
<head>
	<title>Invoice</title>
<style>
	table{
		border-collapse: collapse;
		width: 100%;
	}
	td, th {
		border : 1px solid #000000;
		text-align: center;
	}
</style>
</head>
<body>
	<div style="font-size:64px; color:'#dddddd' "><i>Invoice</i></div>
	<p>
		<i>Toko Online</i><br>
		Semarang, Indonesia<br>
		024123456
	</p>
	<hr>
	<hr>
	<p></p>
	<p>
		Pembeli : {{ Auth::user()->name }}<br>
		Alamat : {{ $data->alamat }}<br>
		Transaksi No : {{ $data->id }}<br>
		Tanggal : {{ date('Y-m-d', strtotime($data->created_at)) }}
	</p>
	<table cellpadding="6" >
		<tr>
			<th><strong>Barang</strong></th>
			<th><strong>Harga Satuan</strong></th>
			<th><strong>Jumlah</strong></th>
            @php
                $harga = ($barang[0]['harga'] * $data->jumlah) + $data->ongkir;
                if ($harga > $data->total_harga) { 
			        echo "<th><strong>Diskon</strong></th>";
                }
            @endphp
			<th><strong>Ongkir</strong></th>
			<th><strong>Total Harga</strong></th>
		</tr>
		<tr>
			<td>{{ $barang[0]["nama"] }}</td>
			<td><?= "Rp ".number_format($barang[0]['harga'],2,',','.') ?></td>
			<td><?= $data->jumlah ?></td>
            @php
                $harga = ($barang[0]['harga'] * $data->jumlah) + $data->ongkir;
                if ($harga > $data->total_harga) { 
                    echo '<td>';
                    echo $diskon[0]["besar_diskon"];
                    echo '</td>';
                }
            @endphp
			<td><?= "Rp ".number_format($data->ongkir,2,',','.') ?></td>
			<td><?= "Rp ".number_format($data->total_harga,2,',','.') ?></td>
		</tr>
	</table>
</body>
</html>