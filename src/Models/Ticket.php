<?php

namespace Pringgojs\LaravelItop\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pringgojs\LaravelItop\Constants\Constants;
use Pringgojs\LaravelItop\Traits\HasTicketRelations;

class Ticket extends Model
{
    use HasFactory, HasTicketRelations;

    protected $table = 'ticket';

    public function scopeRef($q, $ref = null)
    {
        if (!$ref)return;

        $q->where('ref', $ref);
    }

    public function scopeSearch($q, $search = null)
    {
        if (!$search) return;

        $q->where('ref', 'like', '%'.trim($search).'%')
            ->orWhere('title', 'like', '%'.trim($search).'%');
    }

    public function scopeOrderByDefault($q)
    {
        $q->orderBy('start_date', 'desc');
    }

    public function scopeStatus($q, $type = [], $status = [])
    {
        if (in_array('RoutineChange', $type) || in_array('NormalChange', $type) || in_array('EmergencyChange', $type)) {
            $q->whereHas('ticketChange', function ($query) use ($status) {
                $query->whereIn('change.status', $status);
            });
        }

        if (in_array('Incident', $type)) {
            $q->whereHas('ticketIncident', function ($query) use ($status) {
                $query->whereIn('ticket_incident.status', $status);
            });
        }
        if (in_array('Problem', $type)) {
            $q->whereHas('ticketProblem', function ($query) use ($status) {
                $query->whereIn('ticket_problem.status', $status);
            });
        }
        if (in_array('UserRequest', $type)) {
            $q->whereHas('ticketRequest', function ($query) use ($status) {
                $query->whereIn('ticket_request.status', $status);
            });
        }
    }

    public function scopeDate($q, $data = [])
    {
        $type = $data['dateType'];

        if (!$type) return;

        if ($type == 'today') {
            $q->whereDate('start_date', Carbon::today());
            return;
        }

        if ($type == 'this-month') {
            $q->whereYear('start_date', Carbon::now()->year)
                ->whereMonth('start_date', Carbon::now()->month);
            return;
        }

        if ($type == 'this-year') {
            $q->whereYear('start_date', Carbon::now()->year);
            return;
        }

        if ($type == 'other-month') {
            if (!isset($data['year']) || !isset($data['month'])) return;
            
            $q->whereYear('start_date', $data['year'])
                ->whereMonth('start_date', $data['month']);
            return;
        }

        if ($type == 'date-range') {
            $q->whereBetween('start_date', [$data['dateStart'], $data['dateEnd']]);
        }
    }

    public function scopeOpen($q)
    {
        $q->where('operational_status', Constants::TICKET_ONGOING);
    }

    public function scopeClosed($q)
    {
        $q->where('operational_status', Constants::TICKET_CLOSED);
    }

    public function status($raw = false)
    {
        $status = $this->ticketRequest->status ?? $this->ticketChange->status ?? $this->ticketIncident->status ?? $this->ticketProblem->status;
        
        return $raw ? $status :  ucwords(str_replace('_', ' ', $status));
    }
    
    public function getPrivateLog() {
        $text = $this->private_log;

        $pattern = '/========== ([\d-]+\s[\d:]+) : (.*?) \((\d+)\) ============\n\n(.+?)(?=\n==========|\z)/s';
        preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);
    
        $result = [];
        foreach ($matches as $match) {
            $result[] = [
                'timestamp' => $match[1],  // Waktu pesan
                'name' => $match[2],       // Nama pengirim
                'agent_id' => (int) $match[3],  // ID agen
                'message' => trim($match[4]),   // Isi pesan (bisa mengandung HTML)
            ];
        }
    
        return $result;
    }

    public function getPrivateLogIndex() {
        $serializedString = $this->private_log_index;
        // Unserialize data
        $data = unserialize($serializedString);
    
        // Pastikan data hasil unserialize berupa array
        if (!is_array($data)) {
            return [];
        }
    
        return $data;
    }
}
