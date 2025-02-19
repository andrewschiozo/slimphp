<h2 class="text-2xl mb-4">Agendamento #<?= $agendamento['id'] ?></h2>

<div class="mb-4">
    <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
        <span class="font-bold">Data / Hora:</span> <?= date('d/m/Y', strtotime($agendamento['data_hora'])) ?>
    </p>
</div>

<div class="mb-4">
    <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
        <span class="font-bold">Sala:</span> <?= $agendamento['sala'] ?>
    </p>
</div>

<div class="mb-4">
    <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
        <span class="font-bold">Organizador:</span> <?= $agendamento['organizador'] ?>
    </p>
</div>

<div class="mb-4">
    <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
        <span class="font-bold">Setor:</span> <?= $agendamento['setor'] ?>
    </p>
</div>

<div class="mb-4">
    <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3">
        <span class="font-bold">Observações:</span> <?= $agendamento['observacoes'] ?>
    </p>
</div>