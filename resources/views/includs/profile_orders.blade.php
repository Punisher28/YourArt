<div class="row">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User ID</th>
            <th scope="col">Product</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->user_id}}</td>
                <td>{{$order->product_id}}</td>
                <td>{{$order->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
