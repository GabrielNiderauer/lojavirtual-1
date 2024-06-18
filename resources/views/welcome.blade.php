<x-guest-layout>
    <div class="min-h-screen bg-gray-100">

        <header class="bg-gray-600 shadow">

        </header>


        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Produtos</h1>

                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <h2 class="sr-only">Products</h2>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach($products as $product)
                            <a href="#" class="group">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">R$ {{ $product->price }}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-guest-layout>