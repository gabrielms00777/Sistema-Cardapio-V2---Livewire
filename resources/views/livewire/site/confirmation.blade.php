<div x-data="confirmationPage()">
    <header class="flex items-center justify-between p-4 text-white bg-gray-800 shadow-md">
        <a href="{{ route('site.cart') }}" class="flex items-center space-x-2 text-lg text-white hover:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            <span>Voltar</span>
        </a>
        <h1 class="text-lg font-bold">Carrinho</h1>
        <a wire:navigate href="{{ route('site.home') }}"></a>
    </header>

    <div class="p-4 space-y-4 text-center">
        <h2 class="text-xl font-bold">Pedido Confirmado!</h2>
        <p>Obrigado, <span x-text="userName"></span>! Seu pedido está sendo preparado.</p>
        <a wire:navigate href="{{ route('site.home') }}"
            class="w-full px-4 py-2 text-lg font-bold text-white bg-green-600 rounded-md hover:bg-green-500">
            Voltar ao Menu
        </a>
    </div>


</div>

<x-slot name="script">
    <script>
        function confirmationPage() {
            return {
                userName: localStorage.getItem('userName') || '',
                goBackToMenu() {
                    window.location.href = '/home'; // Substitua pelo caminho da tela inicial
                }
            };
        }
    </script>
</x-slot>
