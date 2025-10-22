# Error State Styling - Usage Guide

This document describes how to use the error state components implemented in the UI modernization.

## Components Created

### 1. Flash Message Component (`flash-message.blade.php`)

Displays session messages with status-specific icons and colors.

**Usage:**

```blade
<!-- Success message -->
<x-flash-message type="success">
    Item successfully created!
</x-flash-message>

<!-- Error message -->
<x-flash-message type="error">
    Something went wrong. Please try again.
</x-flash-message>

<!-- Warning message -->
<x-flash-message type="warning">
    Your session is about to expire.
</x-flash-message>

<!-- Info message -->
<x-flash-message type="info">
    New features are available!
</x-flash-message>
```

**In Controllers:**

```php
// Success
return redirect()->route('items.index')
    ->with('success', 'Item created successfully!');

// Error
return redirect()->back()
    ->with('error', 'Unable to process your request.');

// Warning
return redirect()->route('dashboard')
    ->with('warning', 'Please verify your email address.');

// Info
return redirect()->route('home')
    ->with('info', 'Check out our new search features!');
```

### 2. Input Success Component (`input-success.blade.php`)

Displays success validation messages with check icon.

**Usage:**

```blade
<x-input-label for="email" value="Email" />
<x-text-input
    id="email"
    name="email"
    type="email"
    :value="old('email')"
    :hasSuccess="session('email_verified')"
/>
<x-input-success :message="session('email_verified') ? 'Email verified!' : null" />
```

### 3. Enhanced Text Input Component

Now supports error and success states with visual indicators.

**Usage:**

```blade
<!-- Normal state -->
<x-text-input
    id="name"
    name="name"
    type="text"
    icon="user"
/>

<!-- Error state -->
<x-text-input
    id="email"
    name="email"
    type="email"
    :hasError="$errors->has('email')"
/>
<x-input-error :messages="$errors->get('email')" />

<!-- Success state -->
<x-text-input
    id="username"
    name="username"
    type="text"
    :hasSuccess="session('username_available')"
/>
<x-input-success message="Username is available!" />
```

### 4. Error Pages

Custom error pages with icons and rounded elements:

-   **404.blade.php** - Page Not Found
-   **403.blade.php** - Access Denied
-   **500.blade.php** - Server Error
-   **503.blade.php** - Service Unavailable
-   **minimal.blade.php** - Generic error template

These pages automatically display when Laravel encounters the respective HTTP errors.

**Testing Error Pages:**

```php
// In routes/web.php (for testing only)
Route::get('/test-404', function () {
    abort(404);
});

Route::get('/test-500', function () {
    abort(500);
});

Route::get('/test-403', function () {
    abort(403, 'You do not have permission to access this resource.');
});
```

## Layout Integration

Flash messages are automatically displayed in all layouts:

-   **app.blade.php** - Authenticated user layout
-   **guest.blade.php** - Guest/authentication layout
-   **public.blade.php** - Public pages layout

Messages appear at the top of the page content and can be dismissed by clicking the X button.

## Form Validation Example

Complete form with error and success states:

```blade
<form method="POST" action="{{ route('items.store') }}">
    @csrf

    <!-- Title field with error state -->
    <div class="mb-4">
        <x-input-label for="title" value="Title" />
        <x-text-input
            id="title"
            name="title"
            type="text"
            :value="old('title')"
            :hasError="$errors->has('title')"
            required
        />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Description field -->
    <div class="mb-4">
        <x-input-label for="description" value="Description" />
        <textarea
            id="description"
            name="description"
            rows="4"
            class="block w-full border-gray-300 focus:border-sacli-green-500 focus:ring-2 focus:ring-sacli-green-500 rounded-md shadow-sm {{ $errors->has('description') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : '' }}"
        >{{ old('description') }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <!-- Submit button -->
    <div class="flex items-center justify-end">
        <x-primary-button icon="check">
            Submit
        </x-primary-button>
    </div>
</form>
```

## Icons Used

-   **Success**: `check-circle` (green)
-   **Error**: `x-circle` (red)
-   **Warning**: `exclamation-triangle` (yellow)
-   **Info**: `information-circle` (blue)
-   **Validation Error**: `exclamation-circle` (red)

## Styling Classes

### Flash Messages

-   Success: `bg-green-50 border-green-200 text-green-800`
-   Error: `bg-red-50 border-red-200 text-red-800`
-   Warning: `bg-yellow-50 border-yellow-200 text-yellow-800`
-   Info: `bg-blue-50 border-blue-200 text-blue-800`

### Input States

-   Error: `border-red-300 focus:border-red-500 focus:ring-red-500`
-   Success: `border-green-300 focus:border-green-500 focus:ring-green-500`
-   Normal: `border-gray-300 focus:border-sacli-green-500 focus:ring-sacli-green-500`

## Accessibility

All error states include:

-   Proper color contrast ratios
-   Icon + text combinations (not relying on color alone)
-   Screen reader friendly markup
-   Keyboard navigation support
-   Focus states for interactive elements

## Animation

Flash messages include:

-   Fade-in animation on appearance
-   Smooth fade-out when dismissed
-   Transition duration: 200-300ms
