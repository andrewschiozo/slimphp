
<div class="mb-4 overflow-x-auto">
    <table class="table-auto w-full border-collapse border border-gray-400">
        <caption class="bg-gray-900 text-white p-2">
            Reuniões Agendadas
            <div class="display flex justify-end">
                <input type="text" name="filtro" id="filtro" class="mt-1 block w-1/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" placeholder="Filtrar" onkeyup="filtrarTabela()">
            </div>
        </caption>
        <thead>
            <tr class="bg-gray-900 text-white">
                <th class="px-4 py-2">Data/Hora</th>
                <th class="px-4 py-2">Sala</th>
                <th class="px-4 py-2">Organizador</th>
                <th class="px-4 py-2">Setor</th>
                <th class="px-4 py-2 text-left">Observações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
            <?php foreach ($agendamentos as $agendamento) : ?>
            <tr class="hover:bg-gray-400 odd:bg-gray-300 even:bg-gray-200" onclick="window.location.href='/agendamento/<?= $agendamento['id'] ?>'">
                <td class="px-4 py-2 text-center"><?= date('d/m/Y H:i', strtotime($agendamento['data_hora'])) ?></td>
                <td class="px-4 py-2 text-center"><?= $agendamento['sala'] ?></td>
                <td class="px-4 py-2 text-center"><?= $agendamento['organizador'] ?></td>
                <td class="px-4 py-2 text-center"><?= $agendamento['setor'] ?></td>
                <td class="px-4 py-2"><?= $agendamento['observacoes'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function filtrarTabela() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("filtro");
        filter = input.value.toUpperCase();
        table = document.getElementsByTagName("table")[0];
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>