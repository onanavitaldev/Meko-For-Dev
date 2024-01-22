<!-- Flexible navigation bar -->
<nav class="p-1 fixed top-0 mb-20 w-full" style="z-index:999;right:0;background-color:var(--color)">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
        <div class="flex md:order-2">
            <div class="relative block md:block">
                <!-- Search Icon -->
                <a href="account.php" class="button flex gap-1 font-bold" style="color:#fff;width: 40%;padding:0.8em 1em;margin-right: 0.5em;;">
                    <img src="assets/icons/account.png" height="20" width="20">
                </a>
            </div>
            <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-black md:hidden" aria-controls="navbar-search" aria-expanded="false" id="burger">
                <span class="sr-only">Open menu</span>
                <a href="pay.html">
                    <img src="Shopping.png" alt="Acheter" height="25" width="25">
                </a>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
        </div>
    </div>
</nav>