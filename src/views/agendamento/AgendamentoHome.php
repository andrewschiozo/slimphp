<h1 class="text-3xl">
    Agendamento de Reuniões
</h1>

<section class="mt-4 flex items-center">
    <button id="btnNovoAgendamento" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
        Novo Agendamento
    </button>

    <div class="flex items-end ml-auto">
        <a href="/agendamentos" class="block px-2 py-1 font-semibold hover:text-blue-600">
            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8h18m-9 4h9"></path>
            </svg>
            Ver todos
        </a>
        <a href="/agendamentos/proximos" class="block px-2 py-1 font-semibold flex items-center hover:text-blue-600">
            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Ver próximos
        </a>
    </div>
</section>

<section id="formulario" class="hidden fixed top-0 left-0 right-0 bottom-0 bg-black bg-opacity-50 flex items-center justify-center" style="z-index: 1000;">
    <div class="bg-white p-8 rounded-lg shadow-md w-1/3 mx-auto relative">
        <button class="absolute top-0 right-0 p-2 hover:bg-gray-200 rounded-full" onclick="document.getElementById('formulario').classList.toggle('hidden');">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <?= $form; ?>
    </div>
</section>

<section class="mt-4"><?= $tabela; ?></section>

<script>
    document.getElementById('btnNovoAgendamento').addEventListener('click', function() {
        document.getElementById('formulario').classList.toggle('hidden');
    });
</script>
