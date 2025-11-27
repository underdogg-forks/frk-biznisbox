<?php

namespace App\Services;

use App\Models\Partner;
use App\Models\PartnerActivity;

class PartnerService
{
    public function __construct(
        private readonly Partner $partnerModel
    ) {
    }

    public function getPartners($type = null)
    {
        return $this->partnerModel->getPartners($type);
    }

    public function getPartner($id)
    {
        return $this->partnerModel->getPartner($id);
    }

    public function createPartner($data)
    {
        return $this->partnerModel->createPartner($data);
    }

    public function updatePartner($id, $data)
    {
        return $this->partnerModel->updatePartner($id, $data);
    }

    public function deletePartner(string $id)
    {
        return $this->partnerModel->deletePartner($id);
    }

    public function getPartnerNumber()
    {
        return $this->partnerModel->getPartnerNumber();
    }

    public function getPartnersLimitedData($type = null)
    {
        return $this->partnerModel->getPartnersLimitedData($type);
    }

    public function createPartnerActivity($data)
    {
        return (new PartnerActivity())->createPartnerActivity($data);
    }

    public function updatePartnerActivity($id, $data)
    {
        return (new PartnerActivity())->updatePartnerActivity($id, $data);
    }

    public function deletePartnerActivity($id)
    {
        $partnerActivity = new PartnerActivity();
        $partnerActivity = $partnerActivity->deletePartnerActivity($id);

        return $partnerActivity;
    }
}
