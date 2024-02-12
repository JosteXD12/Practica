<x-admin-master>
    @section('content')
    @if (session()->has('role-updated'))
    <div class="alert alert-success">
        {{ session('role-updated') }}
    </div>
    @endif
    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Permission: {{ $permission->name }}</h1>
            <form id="updateForm" method="post" action="{{ route('permissions.update', $permission->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        // Asegurar que se redirija después de la actualización
        document.getElementById('updateForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevenir la acción predeterminada de envío del formulario
            var form = this;
            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
                .then(function (response) {
                    if (response.ok) {
                        window.location.href = "{{ route('permissions.index') }}"; // Redirigir a la página de índice de permisos
                    }
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
        });
    </script>
    @endpush
</x-admin-master>