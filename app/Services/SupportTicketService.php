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

    /**
     * Get ticket contents.
     *
     * @param string $id Ticket ID
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function getTicketContents($id)
    {
        $ticket = $this->supportTicketModel->getSupportTicket($id);

        return $ticket ? $ticket->contents : null;
    }

    /**
     * Create a support ticket.
     *
     * @param array $data Ticket data
     *
     * @return \App\Models\SupportTicket|null
     */
    public function createTicket($data)
    {
        return $this->supportTicketModel->createSupportTicket($data);
    }

    /**
     * Update a support ticket.
     *
     * @param string $id   Ticket ID
     * @param array  $data Ticket data
     *
     * @return \App\Models\SupportTicket|null
     */
    public function updateSupportTicket($id, $data)
    {
        return $this->supportTicketModel->updateSupportTicket($id, $data);
    }

    /**
     * Delete a support ticket.
     *
     * @param string $id Ticket ID
     *
     * @return bool|null
     */
    public function deleteSupportTicket($id)
    {
        return $this->supportTicketModel->deleteSupportTicket($id);
    }

    /**
     * Get ticket messages.
     *
     * @param string $id Ticket ID
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function getTicketMessages($id)
    {
        return $this->supportTicketContentModel->getTicketMessages($id);
    }

    /**
     * Create a ticket message.
     *
     * @param string $ticketId Ticket ID
     * @param array  $data     Message data
     *
     * @return \App\Models\SupportTicketContent|null
     */
    public function createTicketMessage($ticketId, $data)
    {
        return $this->supportTicketContentModel->createTicketMessage($ticketId, $data);
    }

    /**
     * Update a ticket message.
     *
     * @param string $id   Message ID
     * @param array  $data Message data
     *
     * @return \App\Models\SupportTicketContent|null
     */
    public function updateTicketMessage($id, $data)
    {
        return $this->supportTicketContentModel->updateTicketMessage($id, $data);
    }

    /**
     * Delete a ticket message.
     *
     * @param string $id Message ID
     *
     * @return bool|null
     */
    public function deleteTicketMessage($id)
    {
        return $this->supportTicketContentModel->deleteTicketMessage($id);
    }

    public function getTicketNumber()
    {
        return $this->supportTicketModel->getTicketNumber();
    }

    /**
     * Share a ticket.
     *
     * @param string $id Ticket ID
     *
     * @return array|null
     */
    public function shareTicket($id)
    {
        return $this->supportTicketModel->shareTicket($id);
    }
}
