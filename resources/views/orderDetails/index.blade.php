<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order details</title>
</head>
<body>
    <table>
        <tr>
            <th>product id</th>
            <th>kodas</th>
            <th>saskaita kuriai priklauso</th>
            <th>klientas</th>
            <th>trinti</th>
        </tr>
        @foreach($orderDetails as $orderDetail)
<tr>
    <td>{{$orderDetail -> product_id}}</td>
    <td>{{$orderDetail -> orderDetailProducts -> kodas}}</td>
    <td>{{$orderDetail -> orderDetailOrder -> id}}</td>
    <td>{{$orderDetail -> orderDetailOrder -> orderClients -> klientas}}</td>
    <td>
        <form action="{{route('orderDetails.destroy', $orderDetail)}}" method="post">
            @csrf
            <button type="submit">Trinti {{$orderDetail -> details_id}}</button>
        </form>
    </td>
</tr>

        @endforeach
    </table>





</body>
</html>