<form action="{{ route('users.searchByName') }}" method="GET" class="mb-4">
    @csrf
    <div class="flex items-center justify-center">
        <div class="relative">
            <input type="text" name="search" placeholder="Keresés név alapján" class="border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm pl-10 me-2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                @include('icons.search')
            </div>
        </div>
        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 ml-2">Keresés</button>
    </div>
</form>

@error('search')
    @include('users.components.searchErrorMessage')
@enderror