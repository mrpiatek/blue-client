<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['id'] }}</td>
        </tr>
    @endforeach
</table>