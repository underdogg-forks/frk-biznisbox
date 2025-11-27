# BiznisBox Development Guidelines

## Architecture Overview

BiznisBox follows a modern Laravel application architecture with Filament v4 for the admin panel. The application uses a Service-Action pattern where business logic resides in Services and is exposed through Filament Actions.

## Filament v4 Action Pattern

### Overview

The application uses Filament Actions as the primary interface for executing business operations. This approach provides:

- **Consistency**: All operations follow the same pattern
- **Type Safety**: Strong typing through PHP 8.1+ features
- **Reusability**: Actions can be used across different Filament resources
- **Validation**: Built-in form validation through Filament's form builder
- **User Feedback**: Integrated notification system

### Architecture Pattern

```
User Interface (Filament Resource)
         ↓
    Filament Action
         ↓
      Service Layer
         ↓
     Model/Database
```

### Implementation Pattern

All Filament Actions follow this standard structure:

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
            ->form([
                // Optional form fields for user input
            ])
            ->action(function ([Model] $record, array $data) {
                // 1. Inject the service
                $service = app([Module]Service::class);
                
                // 2. Call the service method
                $result = $service->methodName($record->id, $data);
                
                // 3. Handle the response
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Operation failed')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                // 4. Show success notification
                Notification::make()
                    ->title('Success')
                    ->body('Operation completed successfully')
                    ->success()
                    ->send();
                    
                return $result;
            });
    }
}
```

### Service Layer

Services contain the business logic and interact with Models. They should:

- Be injected using Laravel's dependency injection: `app(ServiceClass::class)`
- Return meaningful results (data, boolean, or null on failure)
- Handle database transactions when needed
- Create activity logs for auditing
- Trigger webhooks for external integrations

Example Service Method:

```php
public function performOperation($id, $data)
{
    $model = $this->model->find($id);
    
    if (!$model) {
        return false;
    }
    
    // Perform business logic
    $model->update($data);
    
    // Log activity
    createActivityLog('operation', $id, 'App\Models\Model', 'Model');
    
    // Trigger webhook
    sendWebhookForEvent('model:updated', $model->toArray());
    
    return $model;
}
```

## Action Categories

### Document Actions

Actions that handle document operations (PDF generation, sharing, notifications):

- **Generate PDF**: Uses Service->getPdf() method with 'attach' type
- **Share Document**: Uses Service->share() method to generate share keys
- **Send Notification**: Uses Service->sendNotification() with optional contact parameter

### CRUD Actions

Basic Create, Read, Update, Delete operations are handled by Filament's built-in resource methods. Custom actions are only created for operations beyond standard CRUD.

### Archive/Restore Actions

- **Restore**: Uses Service->restore() method
- **Force Delete**: Uses Service->deletePermanently() method
- **Move**: Uses Service->move() with folder_id parameter

### Admin Actions

Administrative operations that require special permissions:

- **Reset Password**: Uses Admin\UserService->resetPassword()
- **Disable 2FA**: Uses Admin\UserService->disable2fa()
- **Update Settings**: Uses Admin\SettingService methods

## Form Components in Actions

Actions can include form fields for user input:

```php
->form([
    TextInput::make('field_name')
        ->label('Field Label')
        ->required()
        ->helperText('Help text'),
        
    Select::make('dropdown')
        ->options([...])
        ->searchable(),
        
    FileUpload::make('file')
        ->image()
        ->maxSize(2048),
])
```

## Error Handling

All actions should include proper error handling:

```php
try {
    $result = $service->performOperation($record->id);
    
    if (!$result) {
        throw new \Exception('Operation failed');
    }
    
    // Success notification
} catch (\Exception $e) {
    Notification::make()
        ->title('Error')
        ->body('Error: ' . $e->getMessage())
        ->danger()
        ->send();
}
```

## Notifications

Use Filament's notification system for user feedback:

- **Success**: Green notification for successful operations
- **Error/Danger**: Red notification for failures
- **Warning**: Orange notification for important notices
- **Info**: Blue notification for informational messages

## Testing

All actions should have corresponding PHPUnit tests that:

1. Test the service methods independently
2. Mock dependencies when needed
3. Verify activity logs are created
4. Check webhook triggers
5. Validate error handling

Tests are located in `tests/Feature/Controllers/` and test the underlying service methods.

## Best Practices

### DO:
- ✅ Use dependency injection for services: `app(ServiceClass::class)`
- ✅ Validate user input through form rules
- ✅ Provide clear user feedback through notifications
- ✅ Log all significant operations
- ✅ Handle errors gracefully
- ✅ Return meaningful results from service methods
- ✅ Use type hints for better IDE support

### DON'T:
- ❌ Put business logic directly in actions
- ❌ Bypass the service layer
- ❌ Ignore error cases
- ❌ Skip activity logging
- ❌ Hardcode values that should be configurable
- ❌ Mix concerns (keep actions focused)

## Migration from Controllers

The application previously used traditional Laravel Controllers that called Services. The Filament Actions now replace those controller methods:

**Old Pattern (Controller):**
```php
public function shareInvoice($id)
{
    $invoice = $this->invoiceService->shareInvoice($id);
    if (!$invoice) {
        return api_response(null, __('responses.error'), 400);
    }
    return api_response($invoice, __('responses.success'), 200);
}
```

**New Pattern (Filament Action):**
```php
->action(function (Invoice $record) {
    $invoiceService = app(InvoiceService::class);
    $result = $invoiceService->shareInvoice($record->id);
    
    if (!$result) {
        Notification::make()
            ->title('Error')
            ->body('Invoice could not be shared')
            ->danger()
            ->send();
        return;
    }
    
    Notification::make()
        ->title('Success')
        ->body('Invoice shared successfully')
        ->success()
        ->send();
})
```

## File Organization

```
app/
├── Filament/
│   └── Resources/
│       ├── [Module]/
│       │   ├── Actions/
│       │   │   ├── ActionOne.php
│       │   │   └── ActionTwo.php
│       │   ├── Pages/
│       │   └── [Module]Resource.php
│       └── Admin/
│           └── [Module]/
│               └── Actions/
├── Services/
│   ├── [Module]Service.php
│   └── Admin/
│       └── [Module]Service.php
└── Models/
    └── [Model].php
```

## Using Actions in Resources

Actions are used in Filament Resource pages:

```php
use App\Filament\Resources\Module\Actions\ActionName;

protected function getHeaderActions(): array
{
    return [
        ActionName::make(),
        // ... other actions
    ];
}
```

## Conclusion

This pattern provides a clean separation of concerns:
- **Filament Actions**: Handle user interaction and UI feedback
- **Services**: Contain business logic and data manipulation
- **Models**: Represent data and database interactions

By following these guidelines, the codebase remains maintainable, testable, and consistent.
