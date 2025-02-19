<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Agenda de Reuniões - <?= $title ?? '' ?>
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body id="app" class="antialiased text-gray-900 bg-gray-200 min-h-screen">
    <header class="bg-gray-900 sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
        <div class="flex items-center justify-between px-4 py-3 sm:p-0">
        <div class="rounded-full bg-gray-100 p-2">
            <img class="h-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAC00lEQVR4Ae2VY9AeQRCEJ7Zt27Zt27Zt27Zt27Zt2z53qpPar2I796Nf7NzMPoPdkxwN8/5WuQAuwJ8H4AK4APrKOF6+NsjZkTG8U/T9ZgAcluwwdxwGdpo4Lw9ezJf+bz6IpxIROLsEOP3YuRVBNw/IzBcjxA9t1l7Zo22MD22OtHvT50F7b2GNi7NtaIMeU/Q174Tc/XSlFHgLQJsrlZw9ggOrOmJii1pY0jk9bk9JgHsdZR/t1kKJah8KRDtGNiiMKdUS2bRrQ308VgD6zgQw1kj79wA2BsOaSWXoR2HbpJR4tjiMzQQ9ABjo9twkGJcv4MnOcUIU3lfWd4tn/UI6uzvFx45GQYpYQ2Tx0QFJ0T5ZxIe0T80TpfLlbsGsp1Pj4Gl36W2ulA2fAjDPBHaappA81NquMv3JgrigP+3C7LgZdaqBn5DKGWsk3eHpGesMy+szBQFvzowBwij7ze6eG7wC6CMXtJmyli34GAAzfnNdmyF7CPFgujSQ+x29xb3TMRIIoAaKfTLPyxWMlEvrexUcQQBudrdDkHQqyKPFUoabvglwf4a0fRfA3BEKzPbNdVbs/NgEYBLChUMt/eNy1xR41kVG8/+TZ8dTsWxzmmVBYok0hy0gsbZZrl28ODgB7Xha4eHFJYlBHwbk76lNfQ3msFKsLJPj7HBmWF1sqxAcONLCup0W00tGB+0EEPa8T64EIJX9uBss/SYWDCmEyokjoFGiMBtVmy5viu9h50D2yB4KrBiH8OjKDCAEZ4nikD4aH3smTwznh60wrpfFrYv7sbBZXmwpHGLqW8eQg8UhIwgD984YYvaUYtGjqgdZ/unFg51unz4B2mV+DVYjRpxQtB1d6O8Q1yj6MjtW9eE0mbpiVFDQR2l6VnnAhD96EbFUPN8fu5gaJvIfmHpzjSAUfdl3JcZRtsWFYoSgfulVTHj3ZeQCuAAugAvwxwO8BNNeJL3mnTzvAAAAAElFTkSuQmCC" alt="Workcation">
        </div>
        <div>
            <button id="menu-toggle" type="button" class="block text-gray-500 hover:text-white focus:text-white focus:outline-none sm:hidden">
            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
            </svg>
            </button>
        </div>
        </div>
        <nav id="menu" class="hidden sm:flex sm:p-0">
            <!-- <a href="/" class="block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">Home</a> -->
        </nav>
    </header>
    
    <main class="mx-auto px-4 py-6"><?= $content ?></main>

    <footer class="fixed bottom-0 left-0 right-0 p-1 bg-gray-200 text-center">
        <small>Chaves Gold - Todos os direitos reservados</small>
    </footer>

    <script>
        const toggleMenu = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        toggleMenu.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>