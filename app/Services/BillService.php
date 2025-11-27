<?php

namespace App\Services;

use App\Models\Bill;
use App\Services\Concerns\GeneratesPdf;

class BillService
{
    use GeneratesPdf;

    public function __construct(
        private readonly Bill $billModel
    ) {
    }

    public function getBills()
    {
        return $this->billModel->getBills();
    }

    public function getBill($id)
    {
        return $this->billModel->getBill($id);
    }

    public function createBill($data)
    {
        return $this->billModel->createBill($data);
    }

    public function updateBill($id, $data)
    {
        return $this->billModel->updateBill($id, $data);
    }

    public function deleteBill($id)
    {
        return $this->billModel->deleteBill($id);
    }

    public function getBillNumber()
    {
        return $this->billModel->getBillNumber();
    }

    /**
     * Get bill PDF.
     *
     * @param string $id   Bill ID
     * @param string $type Type of PDF (stream, download, attach)
     *
     * @return mixed PDF output based on type
     */
    public function getBillPdf($id, $type = 'stream')
    {
        $bill = $this->billModel->getBill($id);

        return $this->generatePdf(
            document: $bill,
            view: 'pdfs.bill',
            type: $type,
            filename: 'Bill',
            activity: $type === 'download' ? 'DownloadBillPdf' : 'ViewBillPdf',
            model: Bill::class
        );
    }
}
