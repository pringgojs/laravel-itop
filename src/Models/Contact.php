<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function person()
    {
        return $this->hasOne(Person::class, 'id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'contact_id');
    }

    public function lnkcontacttocontracts()
    {
        return $this->hasMany(Lnkcontacttocontract::class, 'contact_id');
    }

    public function lnkcontacttofunctionalcis()
    {
        return $this->hasMany(Lnkcontacttofunctionalci::class, 'contact_id');
    }

    public function lnkcontacttoservices()
    {
        return $this->hasMany(Lnkcontacttoservice::class, 'contact_id');
    }

    public function lnkcontacttotickets()
    {
        return $this->hasMany(Lnkcontacttoticket::class, 'contact_id');
    }

    public function lnkdeliverymodeltocontacts()
    {
        return $this->hasMany(Lnkdeliverymodeltocontact::class, 'contact_id');
    }

    public function privEventNewsrooms()
    {
        return $this->hasMany(PrivEventNewsroom::class, 'contact_id');
    }

    public function privLnkActionNotifToContacts()
    {
        return $this->hasMany(PrivLnkActionNotifToContact::class, 'contact_id');
    }

    public function scopeElitery($q)
    {
        $q->where('org_id', 1);
    }

    public function scopeJoinPerson($q)
    {
        $q->join('person', 'contact.id', '=', 'person.id');
    }

    public function scopeSelectFullName($q)
    {
        $q->joinPerson()
        ->select([
            'contact.id',
            \DB::raw("CONCAT(person.first_name, ' ', contact.name) as name")
        ]);
        
    }

    public function scopeOrderByDefault($q)
    {
        $q->orderBy('name');
    }

    public function scopeClassTeam($q)
    {
        $q->where('finalClass', 'Team');
    }

    public function scopeClassPerson($q)
    {
        $q->where('finalClass', 'Person');
    }

    public function getFullName()
    {
        return $this->person->first_name . ' '. $this->name;
    }
}
