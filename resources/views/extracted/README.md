# Extracted Blade Files Summary

This directory contains 127 Blade template files extracted from Vue.js single-file components.

## Structure

- **App.blade.php** - Main application template
- **components/** - 33 reusable component templates
  - **dashboard/** - 11 dashboard widgets
    - **admin/** - 2 admin-specific widgets
  - **form/** - 13 form input components
- **layouts/** - 1 layout template
- **views/** - 92 page view templates organized by feature

## Total Files by Category

### Components (33 files)
- General Components: 6 files
- Dashboard Components: 11 files (including 2 admin components)
- Form Components: 13 files
- Layout Components: 1 file

### Views (92 files)
- **accounts/** - 4 files (list, create, edit, view)
- **admin/** - 24 files
  - departments/ - 4 files
  - roles/ - 4 files
  - settings/ - 11 files (company, currency, email, general, integrations, etc.)
  - users/ - 4 files
  - AdminDashboard.blade.php
- **archive/** - 1 file
- **auth/** - 2 files (login, logout)
- **bills/** - 4 files
- **client/** - 4 files (contract, invoice, quote, support ticket)
- **client_portal/** - 8 files
- **contracts/** - 4 files
- **employees/** - 4 files
- **install/** - 6 files (requirements, database, user, company, migrate/seed, finish)
- **invoices/** - 4 files
- **partners/** - 4 files
- **payments/** - 2 files
- **products/** - 4 files
- **projects/** - 2 files
- **quotes/** - 4 files
- **support/** - 3 files
- **transactions/** - 4 files
- **Calendar.blade.php**
- **Dashboard.blade.php**
- **Error.blade.php**
- **Profile.blade.php**

## Usage Notes

These files contain Vue-specific syntax and directives that need to be converted to Blade/Laravel equivalents:

1. **Vue directives** (v-if, v-for, v-model, etc.) need conversion to Blade directives
2. **Vue components** (Button, DataTable, Dialog, etc.) need to be replaced with HTML or Blade components
3. **Vue event handlers** (@click, @submit, etc.) need to be replaced with standard HTML forms or JavaScript
4. **Vue data binding** needs to be replaced with controller data passed to views

See the main `VUE_TO_BLADE_MIGRATION.md` file in the project root for detailed conversion guidance.

## Statistics

- Total Blade files: 127
- Lines of template code: ~15,000+ (estimated)
- Vue components referenced: ~50 unique components
- Form inputs: 13 different input types
- CRUD resources: 15 different resources

## Quick Reference

### Main Application Pages
- Dashboard (admin + user)
- Calendar
- Profile
- Error page

### Resource Management (CRUD)
- Accounts
- Bills
- Contracts
- Employees
- Invoices
- Partners
- Payments
- Products
- Projects
- Quotes
- Support Tickets
- Transactions

### Admin Features
- User Management
- Role & Permissions
- Departments
- Settings (11 different sections)

### Client Portal
- Dashboard
- Invoices
- Quotes
- Contracts
- Support
- Partner Details

### Installation Wizard
- Requirements check
- Database setup
- User creation
- Company setup
- Migration & seeding
- Completion

---

For integration into a Laravel application or Filament admin panel, use these files as templates and references for creating the corresponding controllers, routes, and components.
