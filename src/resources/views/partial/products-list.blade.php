<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Actions</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['amount'] }}</td>
            <td>
                <a href="{{ route('products.edit', ['id' => $product['id']]) }}">Edit</a>
                <form method="POST" action="{{ route('products.destroy', ['id' => $product['id']]) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
    @endforeach
</table>