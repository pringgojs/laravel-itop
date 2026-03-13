<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkapplicationsolutiontofunctionalci extends Model
{
    use HasFactory;

    protected $table = 'lnkapplicationsolutiontofunctionalci';

    public function applicationsolution()
    {
        return $this->belongsTo(Applicationsolution::class, 'applicationsolution_id');
    }

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

}