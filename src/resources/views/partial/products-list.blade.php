<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['amount'] }}</td>
        </tr>
    @endforeach
</table>