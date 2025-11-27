<?php

namespace App\Services;

use App\Models\SupportTicket;
use App\Models\SupportTicketContent;

class SupportTicketService
{
    public function __construct(
        private readonly SupportTicket $supportTicketModel,
        private readonly SupportTicketContent $supportTicketContentModel
    ) {
    }

    public function getTickets()
    {
        return $this->supportTicketModel->getSupportTickets();
    }

    public function getTicket($id)
    {
        return $this->supportTicketModel->getSupportTicket($id);
    }

    public function getTicketContents($id)
    {
        $ticket = $this->supportTicketModel->getSupportTicket($id);

        return $ticket ? $ticket->contents : false;
    }

    public function createTicket($data)
    {
        return $this->supportTicketModel->createSupportTicket($data) ?: false;
    }

    public function updateSupportTicket($id, $data)
    {
        return $this->supportTicketModel->updateSupportTicket($id, $data) ?: false;
    }

    public function deleteSupportTicket($id)
    {
        return $this->supportTicketModel->deleteSupportTicket($id) ?: false;
    }

    public function getTicketMessages($id)
    {
        return $this->supportTicketContentModel->getTicketMessages($id) ?: false;
    }

    public function createTicketMessage($ticker_id, $data)
    {
        return $this->supportTicketContentModel->createTicketMessage($ticker_id, $data) ?: false;
    }

    public function updateTicketMessage($id, $data)
    {
        return $this->supportTicketContentModel->updateTicketMessage($id, $data) ?: false;
    }

    public function deleteTicketMessage($id)
    {
        return $this->supportTicketContentModel->deleteTicketMessage($id) ?: false;
    }

    public function getTicketNumber()
    {
        return $this->supportTicketModel->getTicketNumber();
    }

    public function shareTicket($id)
    {
        return $this->supportTicketModel->shareTicket($id) ?: false;
    }
}
