<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.index') }}" method="get">
            <input placeholder="..." class="form-control w-100" type="text" name='search' id="search" value="{{ request('search') }}">
            <button class="btn btn-dark mt-2">Buscar</button>
        </form>
    </div>
</div>