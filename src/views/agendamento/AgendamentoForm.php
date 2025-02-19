<h2 class="text-2xl mb-4">Agendamento #</h2>
<form method="POST" action="/agendamento">
    <div class="mb-4">
        <label for="data" class="block text-sm font-medium text-gray-700">Data</label>
        <input id="data" type="date" name="data" value="<?= date('Y-m-d'); ?>" min="<?= date('Y-m-d'); ?>" onchange= "validarDataHorario()" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3" required>
    </div>

    <div class="mb-4">
        <label for="horario" class="block text-sm font-medium text-gray-700">Horário</label>
        <select id="horario" name="horario" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3" required>
            <option value="09:00">09:00 às 10:00</option>
            <option value="10:00">10:00 às 11:00</option>
            <option value="11:00">11:00 às 12:00</option>
            <option value="12:00">12:00 às 13:00</option>
            <!-- <option value="13:00">13:00 às 14:00</option>
            <option value="14:00">14:00 às 15:00</option>
            <option value="15:00">15:00 às 16:00</option>
            <option value="16:00">16:00 às 17:00</option>
            <option value="17:00">17:00 às 18:00</option>
            <option value="18:00">18:00 às 19:00</option> -->
        </select>
    </div>

    <div class="mb-4">
        <label for="sala" class="block text-sm font-medium text-gray-700">Sala</label>
        <select id="sala" name="sala" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3" required onchange="toggleSala()">
            <option>Sala Video conferência 1 - Primeiro Andar</option>
            <option>Sala Video conferência 2 - Térreo</option>
            <option>Sala Greco 3- sem video - Primeiro Andar</option>
            <option>Outro</option>
        </select>
        <div id="outra-sala-content" style="display: none;">
            <label for="outra-sala" class="block text-sm font-medium text-gray-700 mt-4">Outra sala</label>
            <input type="text" name="outra-sala" id="outra-sala" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
        </div>
    </div>

    <div class="mb-4">
        <label for="organizador" class="block text-sm font-medium text-gray-700">Organizador</label>
        <input id="organizador" type="text" name="organizador" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3" required>
    </div>

    <div class="mb-4">
        <label for="setor" class="block text-sm font-medium text-gray-700">Setor</label>
        <select id="setor" name="setor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3" required>
            <option>Diretoria</option>
            <option>RH</option>
            <option>Compras</option>
            <option>Logistica</option>
            <option>Financeiro</option>
            <option>Contabil</option>
            <option>Credito & Cobrança</option>
            <option>Fiscal</option>
            <option>T.I</option>
            <option>Comercial</option>
            <option>Transponder</option>
            <option>Outro</option>
        </select>
    </div>

    <div class="mb-6">
        <label for="observacoes" class="block text-sm font-medium text-gray-700">Observações</label>
        <textarea id="observacoes" name="observacoes" id="observacoes" cols="30" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3"></textarea>
    </div>

    <div class="flex justify-center w-full">
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">
            Salvar
        </button>
    </div>
</form>

<script>

    function validarDataHorario() {
        var dataSelecionada = document.getElementById('data').value;
        var dataAtual = new Date();

        var horarios = document.getElementById('horario').options;
        var proximoHorarioValido = [];

        Array.from(horarios).map(horario => {
            let dataHorario = new Date(dataSelecionada + ' ' + horario.value);
            horario.disabled = dataHorario < dataAtual;

            if(!horario.disabled)
                proximoHorarioValido.push(horario);
        })

        if(proximoHorarioValido.length > 0)
            proximoHorarioValido[0].selected = proximoHorarioValido.length > 0;
        
        document.getElementById('horario').setCustomValidity(proximoHorarioValido.length > 0 ? '' : 'Data/horário indisponível.');
    }

    function toggleSala() {
        var select = document.getElementById('sala');
        var outraSala = document.getElementById('outra-sala-content');
        outraSala.style.display = select.value === 'Outro' ? 'block' : 'none';
    }

    validarDataHorario();
</script>