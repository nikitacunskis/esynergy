<x-app-layout>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="/dashboard/create" title="Create a product"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="/dashboard/show/{{$product->id}}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>

                    <a href="/dashboard/edit/{{$product->id}}">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>
                    <form action="/dashboard/destroy" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$product->id}}" />
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
