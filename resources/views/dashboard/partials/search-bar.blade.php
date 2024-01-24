
        <form action="{{ route('dashboard.index') }}" method="get" class='d-flex'>
            <input placeholder="..." class="form-control w-100 me-2" type="text" name='search' id="search" value="{{ request('search') }}">
            <button class="btn btn-dark">Buscar</button>
        </form>

