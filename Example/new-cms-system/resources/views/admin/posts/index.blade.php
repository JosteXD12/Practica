<x-admin-master>
    @section('content')
    <h1>All Post</h1>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Owner</th>
                        <th>Titulo</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Update At</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Owner</th>
                        <th>Titulo</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Update At</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->titulo}}</td>
                        <td>
                            <img height="40px" src="{{ asset($post->post_image) }}" alt="">
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->update_at}}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    @endsection
    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection



</x-admin-master>