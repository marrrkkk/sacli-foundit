<x-public-layout>
    <x-slot name="title">About FoundIt</x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-sacli-green-500 to-sacli-green-600 rounded-2xl shadow-lg mb-6">
                <x-icon name="magnifying-glass" size="xl" class="text-sacli-yellow-500" />
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">About FoundIt</h1>
            <p class="text-xl text-gray-600">Helping reunite people with their belongings</p>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-8 space-y-6">
                <div>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        <span class="font-semibold text-sacli-green-600">FoundIt</span> is the official Lost and Found
                        information system of
                        <span class="font-semibold">St. Anne College Lucena, Inc.</span> It was developed with one clear
                        goal in mind: to help students, faculty, and
                        staff recover lost items and return found ones with ease, transparency, and accountability.
                    </p>
                </div>

                <div>
                    <p class="text-gray-700 leading-relaxed">
                        At FoundIt, we believe that a responsible campus starts with a responsible community. That's why
                        we built a platform where everyone can report a lost item, post a found
                        one, and browse listings — all in one safe, easy-to-use environment.
                    </p>
                </div>

                <div>
                    <p class="text-gray-700 leading-relaxed">
                        This system is proudly maintained by the St. Anne College tech team and is accessible to all
                        members of the SACLI community. Submissions are reviewed by staff to ensure
                        accuracy and integrity. With features like category-based filtering, date tracking, and image
                        uploads, FoundIt makes lost and found management fast, efficient, and
                        student-friendly.
                    </p>
                </div>

                <div class="bg-sacli-grey-200 rounded-lg p-6 my-8">
                    <p class="text-gray-700 leading-relaxed">
                        Let's work together to create a culture of honesty and helpfulness on campus. Whether you lost
                        something, found something, or just want to help —
                        <span class="font-semibold text-sacli-green-600">FoundIt is here for you.</span>
                    </p>
                </div>

                <div class="text-center italic text-gray-600 border-t border-gray-200 pt-6">
                    "Every item has a story. Help it find its way home."
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
                <div class="w-12 h-12 bg-sacli-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <x-icon name="shield-check" size="lg" class="text-sacli-green-600" />
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Verified Items</h3>
                <p class="text-sm text-gray-600">All submissions are reviewed by staff to ensure accuracy and prevent
                    misuse</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
                <div class="w-12 h-12 bg-sacli-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <x-icon name="bell" size="lg" class="text-sacli-green-600" />
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Email Notifications</h3>
                <p class="text-sm text-gray-600">Get notified when new items matching your interests are posted</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
                <div class="w-12 h-12 bg-sacli-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <x-icon name="users" size="lg" class="text-sacli-green-600" />
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Community Driven</h3>
                <p class="text-sm text-gray-600">Built by SACLI, for SACLI — helping our community stay connected</p>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mt-12 bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Need Help?</h2>
            <p class="text-gray-600 mb-6">If you have questions or need assistance, feel free to reach out to us.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:definitelynotmark03@gmail.com"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-sacli-green-600 hover:bg-sacli-green-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                    <x-icon name="envelope" size="sm" />
                    Contact Us
                </a>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-lg border border-gray-300 shadow-sm hover:shadow-md transition-all duration-200">
                    <x-icon name="home" size="sm" />
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
