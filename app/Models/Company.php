<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Company extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';
    protected $guarded = [];
    protected $timestamp = true;

    /**
     * Get the jobs belongs to the company.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('is_premium', 'desc');
    }

    /**
     * Get the jobs belongs to the company.
     */
    // public function jobsPaginate()
    // {
    //     return Job::where('company_id', $this->id)->paginate(15);
    // }
    public function getSlugAttribute() {
        $lowercase = strtolower($this->name);
        return str_replace(" ", "-", $lowercase);
    }
}

?>