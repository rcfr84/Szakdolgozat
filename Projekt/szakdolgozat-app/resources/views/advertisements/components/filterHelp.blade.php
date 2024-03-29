<div class="flex flex-col items-center justify-center">
    <label>
        <input type="checkbox" id="filterCheckbox"> Szűrés megjelenítése
    </label>
    <div id="filterSection" style="display: none;">
        <form action="{{ route('advertisements.filter') }}" method="GET" class="mb-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center mb-4">
                <div class="mb-4">
                    <label for="countySelect" class="block text-sm font-medium text-gray-700">Vármegye:</label>
                    <select class="form-select" name="county_id" id="countySelect">
                        <option value="">Válassz vármegyét</option>
                        @foreach ($counties as $county)
                            <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="citySelect" class="block text-sm font-medium text-gray-700">Város:</label>
                    <select class="form-select" name="city_id" id="citySelect">
                        <option value="">Válassz várost</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategória:</label>
                    <select class="form-select" name="category_id" id="category">
                        <option value="">Válassz kategóriát</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center mb-4">
                <div class="mb-4">
                    <label for="min_price" class="block text-sm font-medium text-gray-700">Minimum ár:</label>
                    <input type="number" name="min_price" placeholder="Ft" class="mb-4">
                    
                </div>
                <div class="mb-4">
                    <label for="max_price" class="block text-sm font-medium text-gray-700">Maximum ár:</label>
                    <input type="number" name="max_price" placeholder="Ft" class="mb-4">
                </div>
                <div class="mb-4">
                    <label for="sort" class="block text-sm font-medium text-gray-700">Rendezés:</label>
                    <select class="form-select" name="sort_by" id="sort_by">
                        <option value="default">Alapértelmezett</option>
                        <option value="asc">Növekvő ár</option>
                        <option value="desc">Csökkenő ár</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Alkalmaz</button>
            </div>
        </form>
    </div>
</div>