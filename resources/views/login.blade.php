<x-navbar></x-navbar>

<body class="font-serif">
    <section>
        <div class="justify-items-center ">
            <img src="{{ asset('img/logo_login.svg') }}" class="lg:w-1/5 w-1/3 md:w-1/4" alt="">
            <div>
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="email" class="block text-sm/6 font-bold text-gray-900">Username</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-bold text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                    password?</a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="current-password"
                                required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-green-900 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-hijaunavbar focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="w-full absolute bg-hijaumuda p-3 inset-x-0 bottom-0 text-white text-center">Copyright &#169;
            {{ date('Y') }} Posyandu Online
        </div>

    </section>

</body>
