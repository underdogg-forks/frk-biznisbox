<?php

namespace App\Services;

use App\Models\Contract;
use App\Services\Concerns\GeneratesPdf;

class ContractService
{
    use GeneratesPdf;

    public function __construct(
        private readonly Contract $contractModel
    ) {
    }

    public function getContracts()
    {
        return $this->contractModel->getContracts();
    }

    public function getContract($id)
    {
        return $this->contractModel->getContract($id);
    }

    public function createContract($data)
    {
        return $this->contractModel->createContract($data);
    }

    public function updateContract($id, $data)
    {
        return $this->contractModel->updateContract($id, $data);
    }

    public function deleteContract($id)
    {
        return $this->contractModel->deleteContract($id);
    }

    public function getContractNumber()
    {
        return $this->contractModel->getContractNumber();
    }

    /**
     * Get contract PDF.
     *
     * @param string $id   Contract ID
     * @param string $type Type of PDF (stream, download, attach)
     *
     * @return mixed PDF output based on type
     */
    public function getContractPdf($id, $type = 'stream')
    {
        $contract = $this->getContract($id);

        if (! $contract) {
            abort(404, 'Contract not found');
        }

        return $this->generatePdf(
            document: $contract,
            view: 'pdfs.contract',
            type: $type,
            filename: 'Contract',
            activity: $type === 'download' ? 'DownloadContract' : 'ViewContract',
            model: Contract::class
        );
    }

    public function shareContract($id, $data)
    {
        return $this->contractModel->shareContract($id, $data);
    }
}
