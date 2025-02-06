<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de Mesas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-gray-800">Mesas do Estabelecimento</h3>
                        <a href="{{ route('admin.table.create') }}" wire:navigate
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Adicionar Mesa
                        </a>
                    </div>

                    <div x-data="{
                        openModal: false,
                        name: '',
                        qrcode: null,
                        printQrCode() {
                            const printWindow = window.open('', '_blank');
                            printWindow.document.write(this.qrcode);
                            printWindow.document.close();
                            printWindow.print();
                        }
                    }" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($this->tables as $table)
                            <div x-data="{ table: {{ $table }} }"
                                class="bg-white border border-gray-200 rounded-lg shadow-md p-4 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-4">
                                        <h4 class="text-lg font-semibold text-gray-800 ">Mesa {{ $table->number }}
                                        </h4>
                                        <span
                                            class="px-3 py-1 text-xs rounded-full {{ $table->status == 'free' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                                            {{ $table->status == 'free' ? 'Livre' : 'Ocupada' }}
                                        </span>
                                    </div>
                                    <div class="mb-4">
                                        <span class="size-20 object-contain mx-auto cursor-pointer"
                                            @click="openModal = true; name = table.number; qrcode = table.qrcode; ">

                                            {!! $table->qrcode !!}
                                        </span>
                                    </div>
                                    {{-- <div class="text-sm mb-4">
                                        <span
                                            class="px-3 py-1 text-xs rounded-full {{ $table->status == 'free' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                                            {{ $table->status == 'free' ? 'Livre' : 'Ocupada' }}
                                        </span>
                                    </div> --}}
                                </div>
                                <div class="flex justify-between">
                                    <a href="{{ route('admin.table.edit', $table->id) }}"
                                        class="px-3 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                                        Editar
                                    </a>
                                    <form action="" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir esta mesa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-700">
                                Nenhuma mesa cadastrada.
                            </div>
                        @endforelse

                        <div x-show="openModal"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                            @click.away="openModal = false">
                            <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 relative">
                                <button @click="openModal = false"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">
                                    &times;
                                </button>
                                <h3 class="text-lg font-medium text-gray-700 mb-4">QR Code da Mesa <span
                                        x-text="name"></span></h3>
                                <div x-html="qrcode" class="w-full h-auto mb-4 flex justify-center"></div>
                                <button @click="printQrCode(qrcode)"
                                    class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Imprimir QR Code
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="qrcodeModal" wire:ignore class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 relative">
        <button onclick="closeQrCode()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">
            &times;
        </button>
        <h3 class="text-lg font-medium text-gray-700 mb-4">QR Code da Mesa</h3>
        <div id="qrcodeImage" class="w-full h-auto mb-4">
        </div>
        <button onclick="printQrCode()" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Imprimir QR Code
        </button>
    </div>
</div> --}}

    {{-- <script>
        function showQrCode(url) {
            document.getElementById('qrcodeImage').innerHTML = qrcode;
            document.getElementById('qrcodeModal').classList.remove('hidden');
            document.getElementById('qrcodeModal').classList.add('flex');
        }

        function closeQrCode() {
            document.getElementById('qrcodeModal').classList.add('hidden');
            document.getElementById('qrcodeModal').classList.remove('flex');
        }

        function printQrCode() {
            const printWindow = window.open('', '_blank');
            const qrCodeImage = document.getElementById('qrcodeImage').innerHTML;
            printWindow.document.write(`<img src="${qrCodeImage}" style="width:100%;height:auto;">`);
            printWindow.document.close();
            printWindow.print();
        }
    </script> --}}
    <script>
        function printQrCode(qrcode) {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <!DOCTYPE html>
                <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Imprimir QR Code</title>
                    <style>
                        body { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                        img { max-width: 100%; height: auto; }
                    </style>
                </head>
                <body>
                    ${qrcode}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</div>
