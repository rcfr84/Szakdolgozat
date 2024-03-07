@if ($errors->any())
    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Danger</span>
        <div>
            <span class="font-medium">Hiba történt, lehetséges okok:</span>
            <ul class="mt-1.5 list-disc list-inside">
                <li>Nem lehetnek üresek a vármegye, város, kategória, ár, cím és leírás mezők.</li>
                <li>A cím mező nem lehet hosszabb 40 karakternél.</li>
                <li>A leírás mező nem lehet hosszabb 1000 karakternél.</li>
                <li>A telefonszám mező nem lehet hosszabb 20 karakternél.</li>
                <li>A képek nem jó formátumban vannak vagy nem lehet nagyobbak 10 megabájtnál.</li>
                <li>Az ár mező értéke kisebb kell, hogy legyen, mint 2147483647 és nagyobb, mint 0.</li>
            </ul>
        </div>
    </div>
@endif