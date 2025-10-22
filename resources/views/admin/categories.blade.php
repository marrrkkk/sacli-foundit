<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-sacli-green-500 to-sacli-green-600 rounded-lg flex items-center justify-center shadow-md">
                    <x-icon name="tag" size="md" class="text-white" />
                </div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manage Categories') }}
                </h2>
            </div>
            <div class="flex gap-3">
                <x-secondary-button onclick="window.location.href='{{ route('admin.dashboard') }}'" icon="arrow-left">
                    Back to Dashboard
                </x-secondary-button>
                <x-primary-button onclick="openCategoryModal()" icon="plus-circle">
                    Add New Category
                </x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                <div class="p-6">
                    @if ($categories->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($categories as $category)
                                <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg hover:border-sacli-green-300 transition-all duration-200 group"
                                    data-category-id="{{ $category->id }}">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-3">
                                                @if ($category->icon)
                                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform duration-200"
                                                        style="background-color: {{ $category->color }}20; color: {{ $category->color }}">
                                                        <i class="{{ $category->icon }} text-xl"></i>
                                                    </div>
                                                @else
                                                    <div
                                                        class="w-12 h-12 bg-gradient-to-br from-sacli-green-100 to-sacli-green-200 rounded-xl flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform duration-200">
                                                        <x-icon name="tag" size="md"
                                                            class="text-sacli-green-600" />
                                                    </div>
                                                @endif
                                                <div>
                                                    <h3
                                                        class="text-lg font-semibold text-gray-900 group-hover:text-sacli-green-600 transition-colors">
                                                        {{ $category->name }}</h3>
                                                    <p class="text-sm text-gray-500 flex items-center gap-1">
                                                        <x-icon name="cube" size="xs" class="text-gray-400" />
                                                        {{ $category->items_count }} items
                                                    </p>
                                                </div>
                                            </div>

                                            @if ($category->description)
                                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                                    {{ $category->description }}</p>
                                            @endif

                                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                                <span
                                                    class="inline-flex items-center gap-1 px-2 py-1 bg-gray-100 rounded-lg">
                                                    <x-icon name="swatch" size="xs" class="text-gray-400" />
                                                    <div class="w-3 h-3 rounded-full border border-gray-300"
                                                        style="background-color: {{ $category->color }}"></div>
                                                    {{ $category->color }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="flex-shrink-0 ml-4">
                                            <div class="flex flex-col gap-2">
                                                <button onclick="editCategory({{ $category->id }})"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-sacli-green-600 bg-sacli-green-50 rounded-lg hover:bg-sacli-green-100 transition-colors">
                                                    <x-icon name="pencil-square" size="xs" />
                                                    Edit
                                                </button>
                                                @if ($category->items_count == 0)
                                                    <button onclick="deleteCategory({{ $category->id }})"
                                                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                                                        <x-icon name="trash" size="xs" />
                                                        Delete
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div
                                class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <x-icon name="tag" size="xl" class="text-gray-400" />
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">No categories</h3>
                            <p class="text-sm text-gray-500 mb-6">Get started by creating your first category.</p>
                            <x-primary-button onclick="openCategoryModal()" icon="plus-circle">
                                Add Category
                            </x-primary-button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    <div id="category-modal"
        class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 w-full max-w-md">
            <div class="bg-white shadow-2xl rounded-2xl border border-gray-200">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-sacli-green-100 rounded-lg flex items-center justify-center">
                                <x-icon name="tag" size="md" class="text-sacli-green-600" />
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900" id="category-modal-title">Add New Category
                            </h3>
                        </div>
                        <button onclick="closeCategoryModal()"
                            class="text-gray-400 hover:text-gray-600 p-1 rounded-lg hover:bg-gray-100 transition-colors">
                            <x-icon name="x-mark" size="md" />
                        </button>
                    </div>

                    <form id="category-form">
                        <input type="hidden" id="category-id" name="category_id">

                        <div class="mb-4">
                            <label for="category-name"
                                class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                <x-icon name="pencil" size="xs" class="text-gray-400" />
                                Category Name *
                            </label>
                            <input type="text" id="category-name" name="name" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 transition-all"
                                placeholder="Enter category name">
                        </div>

                        <div class="mb-4">
                            <label for="category-description"
                                class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                <x-icon name="document-text" size="xs" class="text-gray-400" />
                                Description
                            </label>
                            <textarea id="category-description" name="description" rows="3"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 transition-all"
                                placeholder="Enter category description"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="category-icon"
                                class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                <x-icon name="sparkles" size="xs" class="text-gray-400" />
                                Icon Class (Optional)
                            </label>
                            <input type="text" id="category-icon" name="icon"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 transition-all"
                                placeholder="e.g., fas fa-mobile-alt">
                            <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                <x-icon name="information-circle" size="xs" class="text-gray-400" />
                                Use Font Awesome or similar icon classes
                            </p>
                        </div>

                        <div class="mb-6">
                            <label for="category-color"
                                class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                <x-icon name="swatch" size="xs" class="text-gray-400" />
                                Color
                            </label>
                            <div class="flex items-center gap-3">
                                <input type="color" id="category-color" name="color" value="#10B981"
                                    class="w-14 h-12 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-sacli-green-500 transition-colors">
                                <input type="text" id="category-color-text"
                                    class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sacli-green-500 focus:border-sacli-green-500 transition-all"
                                    placeholder="#10B981" value="#10B981">
                            </div>
                        </div>

                        <div class="flex justify-end gap-3">
                            <x-secondary-button type="button" onclick="closeCategoryModal()">
                                Cancel
                            </x-secondary-button>
                            <x-primary-button type="submit" id="category-submit-btn" icon="check">
                                Save Category
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let editingCategoryId = null;

            // Color picker synchronization
            document.addEventListener('DOMContentLoaded', function() {
                const colorPicker = document.getElementById('category-color');
                const colorText = document.getElementById('category-color-text');

                colorPicker.addEventListener('change', function() {
                    colorText.value = this.value;
                });

                colorText.addEventListener('input', function() {
                    if (/^#[0-9A-F]{6}$/i.test(this.value)) {
                        colorPicker.value = this.value;
                    }
                });
            });

            function openCategoryModal(categoryId = null) {
                editingCategoryId = categoryId;
                const modal = document.getElementById('category-modal');
                const title = document.getElementById('category-modal-title');
                const submitBtn = document.getElementById('category-submit-btn');

                // Reset form
                document.getElementById('category-form').reset();
                document.getElementById('category-id').value = '';
                document.getElementById('category-color').value = '#10B981';
                document.getElementById('category-color-text').value = '#10B981';

                if (categoryId) {
                    title.textContent = 'Edit Category';
                    submitBtn.querySelector('span').textContent = 'Update Category';

                    // Load category data (in real implementation, this would be an AJAX call)
                    loadCategoryData(categoryId);
                } else {
                    title.textContent = 'Add New Category';
                    submitBtn.querySelector('span').textContent = 'Save Category';
                }

                modal.classList.remove('hidden');
            }

            function closeCategoryModal() {
                document.getElementById('category-modal').classList.add('hidden');
                editingCategoryId = null;
            }

            function loadCategoryData(categoryId) {
                // In a real implementation, this would fetch data via AJAX
                // For now, we'll simulate loading from the DOM
                const categoryElement = document.querySelector(`[data-category-id="${categoryId}"]`);
                if (categoryElement) {
                    const name = categoryElement.querySelector('h3').textContent;
                    const description = categoryElement.querySelector('p.text-gray-600')?.textContent || '';

                    document.getElementById('category-id').value = categoryId;
                    document.getElementById('category-name').value = name;
                    document.getElementById('category-description').value = description;
                }
            }

            function editCategory(categoryId) {
                openCategoryModal(categoryId);
            }

            function deleteCategory(categoryId) {
                if (!confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
                    return;
                }

                fetch(`/admin/categories/${categoryId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const categoryElement = document.querySelector(`[data-category-id="${categoryId}"]`);
                            if (categoryElement) {
                                categoryElement.style.opacity = '0';
                                categoryElement.style.transform = 'scale(0.95)';
                                setTimeout(() => {
                                    categoryElement.remove();
                                }, 300);
                            }
                            showNotification(data.message, 'success');
                        } else {
                            showNotification(data.message || 'An error occurred', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('An error occurred while deleting the category', 'error');
                    });
            }

            // Handle category form submission
            document.getElementById('category-form').addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const categoryId = formData.get('category_id');
                const isEditing = categoryId && categoryId !== '';

                const url = isEditing ? `/admin/categories/${categoryId}` : '/admin/categories';
                const method = isEditing ? 'PUT' : 'POST';

                // Show loading state
                const submitBtn = document.getElementById('category-submit-btn');
                const originalText = submitBtn.querySelector('span').textContent;
                submitBtn.querySelector('span').textContent = 'Saving...';
                submitBtn.disabled = true;

                // Prepare data
                const data = {
                    name: formData.get('name'),
                    description: formData.get('description'),
                    icon: formData.get('icon'),
                    color: formData.get('color')
                };

                fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            closeCategoryModal();
                            showNotification(data.message, 'success');

                            // Reload the page to show updated categories
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            showNotification(data.message || 'An error occurred', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('An error occurred while saving the category', 'error');
                    })
                    .finally(() => {
                        submitBtn.querySelector('span').textContent = originalText;
                        submitBtn.disabled = false;
                    });
            });

            function showNotification(message, type) {
                // Create notification element
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 p-4 rounded-xl shadow-lg z-50 flex items-center gap-2 transform transition-all duration-300 ${
                type === 'success' ? 'bg-sacli-green-100 text-sacli-green-800 border border-sacli-green-200' : 'bg-red-100 text-red-800 border border-red-200'
            }`;

                const icon = document.createElement('span');
                icon.innerHTML = type === 'success' ?
                    '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
                    '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';

                const text = document.createElement('span');
                text.textContent = message;

                notification.appendChild(icon);
                notification.appendChild(text);
                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.style.transform = 'translateX(0)';
                }, 10);

                // Remove after 5 seconds
                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 5000);
            }
        </script>
    @endpush>
</x-app-layout>
