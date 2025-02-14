# Index Page View
## Header
``     <header class="bg-white shadow">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Features</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Company</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                        </div>
                        <div class="py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>``

## Strategy Card
**card header (User Name and Strategy Title)**

``<div class="max-w-4xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <div class="flex items-center gap-5">
            <h2 class="text-2xl font-bold text-gray-800">{{ $strategy->title }}</h2>
            <h2 class="text-sm font-bold text-gray-400">{{ $strategy->user->name }}</h2>
            </div>
            <p class="text-gray-600 mt-2">{{ $strategy->content }}</p>
            <h3 class="mt-4 text-lg font-semibold text-gray-700">Avies:</h3>
        </div>
    </div>
``

**Card Content (Avie)**

``
            <div class="bg-gray-100 p-4 mt-3 rounded-lg shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full">
                        {{ substr($avie->user->name, 0, 1) }}
                    </div>
                    <p class="font-semibold text-gray-800">{{ $avie->user->name }}</p>
                </div>
                <p class="text-gray-700 mt-2">{{ $avie->content }}</p>
                <h4 class="mt-3 font-medium text-gray-700">Feedback:</h4>
            </div>
``

**Card Tags (FeedBack)**

``
	<ul class="mt-2 space-y-1">
		<li class="text-sm text-gray-600 bg-gray-200 px-3 py-1 rounded-full inline-block">
		</li>
	</ul>
``

