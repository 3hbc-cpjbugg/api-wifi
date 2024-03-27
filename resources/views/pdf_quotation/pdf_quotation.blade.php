<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <img style="height:260px; width:260px" src="{{public_path('storage/logos/logo_binary.png')}}" />
    <h2 class="text-center ">Binary Analytics S.A. de C.V.</h2>
    <div class="text-center"> Av. Santa Fe 94, Torre A, piso 8</div>
    <div class="text-center"> adrian.gutierrez@binarypolitics.mx</div>
    <div class="text-center"> www.binarypolitics.org</div>

    <div class="text-center" style="margin-top:10px"> {{$quotation->description}}</div>



    <div class="text-left" style="margin-top:10px">
        <h2> Cotización</h2>
    </div>


    <table>
        <tr>
            <th>Descripción</th>
            <th>Precio (MXN)</th>
            <th>Cantidad</th>
            <th>Total (MXN)</th>
        </tr>
        {{$acumulateTotal = 0}}
        @foreach($quotation->quotations_costs as $quotationCost)

        <tr>
            <td>{{$quotationCost->service->name}}</td>
            <td>${{number_format($quotationCost->value,2)}}</td>
            <td>{{$quotationCost->pivot->quantity}}</td>
            <td>${{number_format($quotationCost->value * $quotationCost->pivot->quantity,2)}}</td>
        </tr>

        {{$acumulateTotal += ($quotationCost->value * $quotationCost->pivot->quantity)}}

        @endforeach
        <tr>
            <td align="center">Total</td>
            <td></td>
            <td></td>
            <td>${{number_format($acumulateTotal,2)}}</td>
        </tr>

    </table>

</body>

</html>

<style>
    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }

    table {
        border-collapse: collapse;

        border: 1px solid black;
        width: 100%!important;
    }


    td {
        background-color: white;
        width: 70%;
    }

    td,
    th {
        border: 1px solid black;
    }
</style>
