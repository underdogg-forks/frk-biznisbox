# Testing TODO List for Filament Actions

## Overview
This document tracks the testing requirements for all Filament Actions and their corresponding Service methods.

## Testing Pattern Required

### Filament Action Test (Livewire-based)
```php
#[Test]
#[Group('actions')]
public function it_performs_action_through_filament(): void
{
    /* arrange */
    $user = User::factory()->create();
    $model = Model::factory()->create();
    $data = ['field' => 'value'];

    /* act */
    $component = Livewire::actingAs($user)
        ->test(EditModel::class, ['record' => $model->id])
        ->callAction('actionName', $data);

    /* assert */
    $component->assertHasNoActionErrors();
    $this->assertDatabaseHas('models', [
        'id' => $model->id,
        'field' => 'value'
    ]);
}
```

### Service Unit Test
```php
#[Test]
#[Group('services')]
public function it_performs_service_method(): void
{
    /* arrange */
    $model = Model::factory()->create();
    $service = app(ModelService::class);
    $data = ['field' => 'value'];

    /* act */
    $result = $service->methodName($model->id, $data);

    /* assert */
    $this->assertNotNull($result);
    $this->assertEquals('value', $result->field);
}
```

## Controller Method Coverage

### InvoiceController (9 methods)
- [x] getInvoices() - Handled by Filament Resource CRUD
- [x] getInvoice($id) - Handled by Filament Resource CRUD
- [x] createInvoice() - Handled by Filament Resource CRUD
- [x] updateInvoice() - Handled by Filament Resource CRUD
- [x] deleteInvoice() - Handled by Filament Resource CRUD
- [x] getInvoiceNumber() - Handled by Filament Resource CRUD
- [x] shareInvoice($id) - **Filament Action: ShareInvoiceAction**
- [x] getInvoicePdf($id) - **Filament Action: GenerateInvoicePdfAction**
- [x] addInvoicePayment($id) - **Filament Action: AddInvoicePaymentAction**
- [x] sendInvoiceNotification($id) - **Filament Action: SendInvoiceNotificationAction**

### QuoteController (9 methods)
- [x] getQuotes() - Handled by Filament Resource CRUD
- [x] getQuote($id) - Handled by Filament Resource CRUD
- [x] createQuote() - Handled by Filament Resource CRUD
- [x] updateQuote() - Handled by Filament Resource CRUD
- [x] deleteQuote() - Handled by Filament Resource CRUD
- [x] getQuoteNumber() - Handled by Filament Resource CRUD
- [x] shareQuote($id) - **Filament Action: ShareQuoteAction**
- [x] convertQuoteToInvoice($id) - **Filament Action: ConvertQuoteToInvoiceAction**
- [x] getQuotePdf($id) - **Filament Action: GenerateQuotePdfAction** (NOT CREATED)
- [x] sendQuoteNotification($id) - **Filament Action: SendQuoteNotificationAction**

### BillController (6 methods)
- [x] getBills() - Handled by Filament Resource CRUD
- [x] getBill($id) - Handled by Filament Resource CRUD
- [x] createBill() - Handled by Filament Resource CRUD
- [x] updateBill() - Handled by Filament Resource CRUD
- [x] deleteBill() - Handled by Filament Resource CRUD
- [x] getBillNumber() - Handled by Filament Resource CRUD
- [x] getBillPdf($id) - **Filament Action: GenerateBillPdfAction**

### ContractController (7 methods)
- [x] getContracts() - Handled by Filament Resource CRUD
- [x] getContract($id) - Handled by Filament Resource CRUD
- [x] createContract() - Handled by Filament Resource CRUD
- [x] updateContract() - Handled by Filament Resource CRUD
- [x] deleteContract() - Handled by Filament Resource CRUD
- [x] getContractNumber() - Handled by Filament Resource CRUD
- [x] getContractPdf($id) - **Filament Action: GenerateContractPdfAction**
- [x] shareContract($id) - **Filament Action: ShareContractAction**

### SupportTicketController (7 methods)
- [x] getTickets() - Handled by Filament Resource CRUD
- [x] getTicket($id) - Handled by Filament Resource CRUD
- [x] createTicket() - Handled by Filament Resource CRUD
- [x] updateTicket() - Handled by Filament Resource CRUD
- [x] deleteTicket() - Handled by Filament Resource CRUD
- [x] shareTicket($id) - **Filament Action: ShareTicketAction**

### ArchiveController (8 methods)
- [x] getArchives() - Handled by Filament Resource (if created)
- [x] getArchive($id) - Handled by Filament Resource (if created)
- [x] createArchive() - Handled by Filament Resource (if created)
- [x] updateArchive() - Handled by Filament Resource (if created)
- [x] deleteArchive() - Handled by Filament Resource (if created)
- [x] restoreDocument($id) - **Filament Action: RestoreDocumentAction** (NOT ATTACHED - No Resource)
- [x] forceDeleteDocument($id) - **Filament Action: ForceDeleteDocumentAction** (NOT ATTACHED - No Resource)
- [x] moveDocument($id) - **Filament Action: MoveDocumentAction** (NOT ATTACHED - No Resource)
- [x] previewDocument($id) - **Filament Action: PreviewDocumentAction** (NOT ATTACHED - No Resource)
- [x] downloadDocument($id) - **Filament Action: DownloadDocumentAction** (NOT ATTACHED - No Resource)

### Admin\UserController (6 methods)
- [x] getUsers() - Handled by Filament Resource CRUD
- [x] getUser($id) - Handled by Filament Resource CRUD
- [x] createUser() - Handled by Filament Resource CRUD
- [x] updateUser() - Handled by Filament Resource CRUD
- [x] deleteUser() - Handled by Filament Resource CRUD
- [x] resetPassword($id) - **Filament Action: ResetUserPasswordAction**
- [x] disable2fa($id) - **Filament Action: DisableUser2FAAction**

### Admin\SettingController (10 methods)
- [x] getSettings() - Handled by Filament Resource CRUD
- [x] updateSettings() - Handled by Filament Resource CRUD
- [x] sentTestEmail() - **Filament Action: TestEmailAction**
- [x] setCompanyLogo() - **Filament Action: UploadCompanyLogoAction**
- [x] removeCompanyLogo() - **Filament Action: RemoveCompanyLogoAction**
- [x] generatePreviewNumber() - **Filament Action: PreviewNumberingAction**
- [ ] Other setting methods...

### Admin\CurrencyController (6 methods)
- [x] getCurrencies() - Handled by Filament Resource CRUD
- [x] getCurrency($id) - Handled by Filament Resource CRUD
- [x] createCurrency() - Handled by Filament Resource CRUD
- [x] updateCurrency() - Handled by Filament Resource CRUD
- [x] deleteCurrency() - Handled by Filament Resource CRUD
- [x] liveUpdateCurrencyRate() - **Filament Action: UpdateCurrencyRatesAction**

## Testing Requirements

### Filament Action Tests (23 tests needed)

#### Invoice Actions (4 tests)
- [ ] `tests/Feature/Filament/Actions/ShareInvoiceActionTest.php`
- [ ] `tests/Feature/Filament/Actions/SendInvoiceNotificationActionTest.php`
- [ ] `tests/Feature/Filament/Actions/AddInvoicePaymentActionTest.php`
- [ ] `tests/Feature/Filament/Actions/GenerateInvoicePdfActionTest.php`

#### Quote Actions (3 tests)
- [ ] `tests/Feature/Filament/Actions/ConvertQuoteToInvoiceActionTest.php`
- [ ] `tests/Feature/Filament/Actions/ShareQuoteActionTest.php`
- [ ] `tests/Feature/Filament/Actions/SendQuoteNotificationActionTest.php`

#### Contract Actions (2 tests)
- [ ] `tests/Feature/Filament/Actions/ShareContractActionTest.php`
- [ ] `tests/Feature/Filament/Actions/GenerateContractPdfActionTest.php`

#### Bill Actions (1 test)
- [ ] `tests/Feature/Filament/Actions/GenerateBillPdfActionTest.php`

#### Support Ticket Actions (1 test)
- [ ] `tests/Feature/Filament/Actions/ShareTicketActionTest.php`

#### Archive Actions (5 tests - requires Archive Resource first)
- [ ] `tests/Feature/Filament/Actions/RestoreDocumentActionTest.php`
- [ ] `tests/Feature/Filament/Actions/ForceDeleteDocumentActionTest.php`
- [ ] `tests/Feature/Filament/Actions/MoveDocumentActionTest.php`
- [ ] `tests/Feature/Filament/Actions/PreviewDocumentActionTest.php`
- [ ] `tests/Feature/Filament/Actions/DownloadDocumentActionTest.php`

#### Admin User Actions (2 tests)
- [ ] `tests/Feature/Filament/Actions/ResetUserPasswordActionTest.php`
- [ ] `tests/Feature/Filament/Actions/DisableUser2FAActionTest.php`

#### Admin Settings Actions (5 tests)
- [ ] `tests/Feature/Filament/Actions/TestEmailActionTest.php`
- [ ] `tests/Feature/Filament/Actions/UpdateCurrencyRatesActionTest.php`
- [ ] `tests/Feature/Filament/Actions/PreviewNumberingActionTest.php`
- [ ] `tests/Feature/Filament/Actions/UploadCompanyLogoActionTest.php`
- [ ] `tests/Feature/Filament/Actions/RemoveCompanyLogoActionTest.php`

### Service Unit Tests (23+ tests needed)

#### InvoiceService Tests
- [ ] `tests/Unit/Services/InvoiceServiceTest.php`
  - [ ] test_share_invoice()
  - [ ] test_get_invoice_pdf()
  - [ ] test_add_invoice_payment()
  - [ ] test_send_invoice_notification()

#### QuoteService Tests
- [ ] `tests/Unit/Services/QuoteServiceTest.php`
  - [ ] test_share_quote()
  - [ ] test_convert_quote_to_invoice()
  - [ ] test_send_quote_notification()

#### BillService Tests
- [ ] `tests/Unit/Services/BillServiceTest.php`
  - [ ] test_get_bill_pdf()

#### ContractService Tests
- [ ] `tests/Unit/Services/ContractServiceTest.php`
  - [ ] test_share_contract()
  - [ ] test_get_contract_pdf()

#### SupportTicketService Tests
- [ ] `tests/Unit/Services/SupportTicketServiceTest.php`
  - [ ] test_share_ticket()

#### ArchiveService Tests
- [ ] `tests/Unit/Services/ArchiveServiceTest.php`
  - [ ] test_restore_document()
  - [ ] test_delete_document_permanently()
  - [ ] test_move_document()
  - [ ] test_preview_document()
  - [ ] test_download_document()

#### Admin\UserService Tests
- [ ] `tests/Unit/Services/Admin/UserServiceTest.php`
  - [ ] test_reset_password()
  - [ ] test_disable_2fa()

#### Admin\SettingService Tests
- [ ] `tests/Unit/Services/Admin/SettingServiceTest.php`
  - [ ] test_sent_test_email()
  - [ ] test_set_company_logo()
  - [ ] test_remove_company_logo()
  - [ ] test_generate_preview_number()

#### Admin\CurrencyService Tests
- [ ] `tests/Unit/Services/Admin/CurrencyServiceTest.php`
  - [ ] test_live_update_currency_rate()

## Implementation Steps

1. **Phase 1: Create Test Infrastructure**
   - [ ] Create `tests/Feature/Filament/Actions/` directory
   - [ ] Create `tests/Unit/Services/` directory structure
   - [ ] Create base test classes with common setup

2. **Phase 2: Implement Service Unit Tests**
   - [ ] Start with InvoiceService tests (most complex)
   - [ ] Continue with other services
   - [ ] Ensure all use Arrange/Act/Assert pattern

3. **Phase 3: Implement Filament Action Tests**
   - [ ] Create tests for Invoice actions
   - [ ] Create tests for other module actions
   - [ ] Test action success and error paths

4. **Phase 4: Verify Coverage**
   - [ ] Run phpunit with coverage
   - [ ] Ensure all action methods are tested
   - [ ] Ensure all service methods are tested

## Notes

- **Challenge**: Testing Filament actions requires Livewire test utilities
- **Current Tests**: API-based controller tests exist, but need Filament-specific tests
- **Missing**: Quote PDF action was not created (only mentioned in service)
- **Blocked**: Archive actions cannot be tested until Archive Resource is created

## Estimated Effort

- Service Unit Tests: ~23 test files, ~60 test methods
- Filament Action Tests: ~23 test files, ~46 test methods (success + error cases)
- Total: ~46 test files, ~106 test methods
- Estimated time: 15-20 hours of work

## Priority Order

1. ✅ Invoice Actions (most critical business functions)
2. ✅ Quote Actions
3. ✅ Contract & Bill Actions
4. ✅ Admin Actions
5. ⚠️ Archive Actions (blocked - needs Resource)
