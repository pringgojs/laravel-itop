<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'document';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function documenttype()
    {
        return $this->belongsTo(Documenttype::class, 'documenttype_id');
    }

    public function lnkcontracttodocuments()
    {
        return $this->hasMany(Lnkcontracttodocument::class, 'document_id');
    }

    public function lnkdocumenttoerrors()
    {
        return $this->hasMany(Lnkdocumenttoerror::class, 'document_id');
    }

    public function lnkdocumenttofunctionalcis()
    {
        return $this->hasMany(Lnkdocumenttofunctionalci::class, 'document_id');
    }

    public function lnkdocumenttolicences()
    {
        return $this->hasMany(Lnkdocumenttolicence::class, 'document_id');
    }

    public function lnkdocumenttopatchs()
    {
        return $this->hasMany(Lnkdocumenttopatch::class, 'document_id');
    }

    public function lnkdocumenttoservices()
    {
        return $this->hasMany(Lnkdocumenttoservice::class, 'document_id');
    }

    public function lnkdocumenttosoftwares()
    {
        return $this->hasMany(Lnkdocumenttosoftware::class, 'document_id');
    }

}