# lmendes/template

A ready-to-use Laravel template package with authentication, dashboard, reusable Blade components, and helpers — installable in any existing Laravel project.

---

## Requirements

- PHP **8.1+**
- Laravel **10, 11 or 12**

---

## Installation

```bash
composer require lmendes/template
```

Then run the install command:

```bash
php artisan template:install
```

This will publish the config, views and run the migrations.

---

## What's included

| Feature | Details |
|---|---|
| **Auth** | Login, Register, Logout controllers & views |
| **Dashboard** | Clean sidebar layout with stats |
| **Profile** | Edit name/email + change password |
| **Blade Components** | `<x-template-card>`, `<x-template-alert>`, `<x-template-button>`, `<x-template-badge>`, `<x-template-modal>` |
| **Helpers** | `template_config()`, `initials()`, `money()`, `template_menu()`, `template_theme()` |

---

## Routes

| URL | Name | Middleware |
|---|---|---|
| `/template/login` | `template.login` | guest |
| `/template/register` | `template.register` | guest |
| `/template/dashboard` | `template.dashboard` | auth |
| `/template/profile` | `template.profile` | auth |

---

## Configuration

After install, edit `config/template.php`:

```php
return [
    'name'  => 'My App',        // App name shown in sidebar
    'theme' => 'light',         // 'light' | 'dark' | 'auto'
    'color' => '#6366f1',       // Brand color (CSS hex)

    'auth' => [
        'register_enabled'     => true,
        'redirect_after_login' => '/dashboard',
    ],

    'menu' => [
        ['label' => 'Dashboard', 'icon' => 'home',  'route' => 'template.dashboard'],
        ['label' => 'Profile',   'icon' => 'user',  'route' => 'template.profile'],
    ],
];
```

Or use `.env` variables:

```env
TEMPLATE_THEME=dark
TEMPLATE_COLOR=#f43f5e
TEMPLATE_REGISTER=false
```

---

## Blade Components

### Card
```blade
<x-template-card title="Users" subtitle="All registered users">
    Content here
</x-template-card>
```

### Alert
```blade
<x-template-alert type="success" title="Done!" :dismissible="true">
    Your changes have been saved.
</x-template-alert>
```
Types: `info` | `success` | `warning` | `danger`

### Button
```blade
<x-template-button variant="primary" size="md">Save</x-template-button>
<x-template-button href="/back" variant="ghost">Cancel</x-template-button>
<x-template-button :loading="true">Saving…</x-template-button>
```
Variants: `primary` | `secondary` | `danger` | `ghost`

### Badge
```blade
<x-template-badge color="green" :dot="true">Active</x-template-badge>
```
Colors: `indigo` | `green` | `red` | `yellow` | `gray`

### Modal
```blade
<x-template-modal id="confirm-modal" title="Confirm action" size="sm">
    <p>Are you sure?</p>
    <x-template-button onclick="closeModal('confirm-modal')" variant="secondary">Cancel</x-template-button>
    <x-template-button variant="danger">Delete</x-template-button>
</x-template-modal>

<x-template-button onclick="openModal('confirm-modal')">Open modal</x-template-button>
```

---

## Helpers

```php
template_config('name')        // Get config value
template_menu()                // Get sidebar menu array
template_theme()               // 'light' | 'dark' | 'auto'
initials('Jean Dupont')        // 'JD'
money(1500.50)                 // '1 500,50 €'
```

---

## Publish views to customise

```bash
php artisan vendor:publish --tag=template-views
```

Views will be copied to `resources/views/vendor/template/` and will take priority over package views.

---

## Artisan command options

```bash
php artisan template:install --force          # Overwrite existing files
php artisan template:install --no-migration   # Skip migrations
```

---

## License

MIT — © lmendes
