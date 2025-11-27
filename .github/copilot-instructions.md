# GitHub Copilot Instructions for BiznisBox

## Project Overview

BiznisBox is a Laravel-based business management application using Filament v4 for the admin panel. The architecture follows a Service-Action pattern where business logic resides in Service classes and is exposed through Filament Actions.

## Code Generation Guidelines

### When Creating New Filament Actions

1. **Location**: Place actions in `app/Filament/Resources/[Module]/Actions/`
2. **Naming**: Use descriptive names ending with `Action.php` (e.g., `ShareInvoiceAction.php`)
3. **Service Integration**: Always inject and use the corresponding Service class
4. **Error Handling**: Include try-catch blocks and provide user feedback via notifications

**Template:**
```php
<?php

namespace App\Filament\Resources\[Module]\Actions;

use App\Models\[Model];
use App\Services\[Module]Service;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class [ActionName]Action
{
    public static function make(): Action
    {
        return Action::make('actionName')
            ->label('Action Label')
            ->icon('heroicon-o-icon-name')
            ->action(function ([Model] $record) {
                $service = app([Module]Service::class);
                $result = $service->methodName($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Operation failed')
                        ->danger()
                        ->send();
                    return;
                }
                
                Notification::make()
                    ->title('Success')
                    ->body('Operation completed')
                    ->success()
                    ->send();
            });
    }
}
```

### When Creating Service Methods

1. **Location**: Place in `app/Services/[Module]Service.php` or `app/Services/Admin/[Module]Service.php`
2. **Return Values**: Return data on success, `false` or `null` on failure
3. **Activity Logging**: Use `createActivityLog()` for audit trails
4. **Webhooks**: Trigger webhooks with `sendWebhookForEvent()` when appropriate

**Template:**
```php
public function performOperation($id, $data = [])
{
    $model = $this->model->find($id);
    
    if (!$model) {
        return false;
    }
    
    // Perform operation
    $model->update($data);
    
    // Log activity
    createActivityLog('operation', $id, 'App\Models\Model', 'Model');
    
    // Trigger webhook if needed
    sendWebhookForEvent('model:updated', $model->toArray());
    
    return $model;
}
```

### Action Categories and Patterns

#### 1. Document PDF Actions
```php
->action(function (Model $record) {
    $service = app(ModuleService::class);
    
    try {
        return response()->streamDownload(function () use ($service, $record) {
            echo $service->getPdf($record->id, 'attach');
        }, 'Document ' . $record->number . '.pdf');
    } catch (\Exception $e) {
        Notification::make()
            ->title('Error')
            ->body('PDF could not be generated: ' . $e->getMessage())
            ->danger()
            ->send();
    }
})
```

#### 2. Share/Generate Link Actions
```php
->action(function (Model $record) {
    $service = app(ModuleService::class);
    $result = $service->share($record->id);
    
    if (!$result) {
        Notification::make()
            ->title('Error')
            ->body('Item could not be shared')
            ->danger()
            ->send();
        return;
    }
    
    $shareUrl = route('clientGetItem') . '?key=' . $result['share_key'];
    
    Notification::make()
        ->title('Share Link Generated')
        ->body("Share this link: {$shareUrl}")
        ->success()
        ->send();
        
    return $shareUrl;
})
```

#### 3. Notification Actions
```php
->form([
    Select::make('contact_id')
        ->label('Recipient Contact')
        ->options(function (Model $record) {
            return PartnerContact::where('partner_id', $record->customer_id)
                ->whereNotNull('email')
                ->pluck('email', 'id');
        })
        ->searchable()
        ->helperText('Leave empty to send to all primary contacts'),
])
->action(function (Model $record, array $data) {
    $service = app(ModuleService::class);
    $contact = isset($data['contact_id']) ? PartnerContact::find($data['contact_id']) : null;
    
    $result = $service->sendNotification($record->id, $contact);
    
    if (!$result) {
        Notification::make()
            ->title('Error')
            ->body('Notification could not be sent')
            ->danger()
            ->send();
        return;
    }
    
    Notification::make()
        ->title('Notification Sent')
        ->body('Notification sent successfully')
        ->success()
        ->send();
})
```

#### 4. Archive/Document Actions
```php
// Download
->action(function (Archive $record) {
    $archiveService = app(ArchiveService::class);
    return $archiveService->downloadDocument($record->id);
})

// Preview
->action(function (Archive $record) {
    $archiveService = app(ArchiveService::class);
    return $archiveService->previewDocument($record->id);
})

// Restore
->requiresConfirmation()
->action(function (Archive $record) {
    $archiveService = app(ArchiveService::class);
    $result = $archiveService->restoreDocument($record->id);
    
    if (!$result) {
        Notification::make()
            ->title('Error')
            ->body('Document could not be restored')
            ->danger()
            ->send();
        return;
    }
    
    Notification::make()
        ->title('Document Restored')
        ->body('Document has been restored')
        ->success()
        ->send();
})
```

### Important Conventions

1. **Dependency Injection**: Always use `app(ServiceClass::class)` to get service instances
2. **Form Fields**: Use Filament's form components (TextInput, Select, FileUpload, etc.)
3. **Icons**: Use Heroicons format: `heroicon-o-icon-name`
4. **Notifications**: Provide clear, actionable feedback to users
5. **Confirmation**: Use `->requiresConfirmation()` for destructive actions
6. **Error Messages**: Include specific error messages from exceptions

### Testing Considerations

When creating actions:
- Ensure corresponding service methods have tests in `tests/Feature/Controllers/`
- Service methods should be tested independently from actions
- Mock external dependencies in tests
- Verify activity logs and webhooks in tests

### Code Style

- Use PHP 8.1+ type hints
- Follow PSR-12 coding standards
- Use meaningful variable names
- Keep actions focused on single operations
- Add PHPDoc blocks for complex logic

### Common Service Methods

Based on existing patterns:
- `share[Model]($id)` - Generate share key and return model
- `send[Model]Notification($id, $contact = null)` - Send email notifications
- `get[Model]Pdf($id, $type = 'stream')` - Generate PDF (types: 'stream', 'download', 'attach')
- `add[Model]Payment($id, $data)` - Add payment records
- `convert[Model]To[OtherModel]($id)` - Convert between models
- `restore[Model]($id)` - Restore soft-deleted models
- `delete[Model]Permanently($id)` - Force delete models
- `move[Model]($request, $id)` - Move to different location

### File Upload Handling

When dealing with file uploads in actions:
```php
->form([
    FileUpload::make('company_logo')
        ->label('Company Logo')
        ->image()
        ->required()
        ->maxSize(2048)
        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
])
->action(function (array $data) {
    $settingService = app(SettingService::class);
    
    $request = new Request();
    $request->files->set('company_logo', $data['company_logo']);
    
    $result = $settingService->setCompanyLogo($request);
    
    // Handle result...
})
```

### Admin Actions

Admin-specific actions should:
- Be placed in `app/Filament/Resources/Admin/[Module]/Actions/`
- Use services from `app/Services/Admin/[Module]Service.php`
- Include appropriate authorization checks
- Have descriptive confirmation modals

### Module Structure

Each module should have:
```
app/Filament/Resources/[Module]/
├── Actions/              # Custom Filament actions
├── Pages/                # Resource pages
├── RelationManagers/     # Relation managers
└── [Module]Resource.php  # Main resource class
```

### Quick Reference

**Notification Types:**
- `->success()` - Green, for successful operations
- `->danger()` - Red, for errors
- `->warning()` - Orange, for important notices
- `->info()` - Blue, for information

**Common Icons:**
- Share: `heroicon-o-share`
- Download: `heroicon-o-arrow-down-tray`
- Upload: `heroicon-o-arrow-up-tray`
- Email: `heroicon-o-envelope`
- PDF: `heroicon-o-document-arrow-down`
- Delete: `heroicon-o-trash`
- Edit: `heroicon-o-pencil`
- View: `heroicon-o-eye`

## Summary

When working with BiznisBox:
1. Business logic stays in Services
2. Filament Actions provide the UI layer
3. Always handle errors and provide user feedback
4. Follow the established patterns for consistency
5. Test service methods independently

This approach ensures maintainable, testable, and user-friendly code.
