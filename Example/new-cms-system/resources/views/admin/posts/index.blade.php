<x-admin-master>
    @section('content')
    <h1>All Post</h1>
    @if(session('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
    @elseif(session('post-created-message'))
    <div class="alert alert-success">{{session('post-created-message')}}</div>
    @elseif(session('post-updated-message'))
    <div class="alert alert-success">{{ session('post-updated-message') }}</div>
    @endif
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
                        <th>Delete</th>
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
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->titulo}}</a></td>
                        <td>
                            <img height="50px" src="{{ asset($post->post_image) }}" alt="">
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->update_at}}</td>
                        <td>
                            {{-- @can('view', $post) --}}
                            <form action="{{route('post.destroy', $post->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>

                            {{-- @endcan --}}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
    </div>

    @endsection
    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->
    @endsection



</x-admin-master>