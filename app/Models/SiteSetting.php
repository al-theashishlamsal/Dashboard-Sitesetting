<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    /**
     * Get the social links associated with the site setting.
     */
    public function socialLinks()
    {
        return $this->hasOne(SocialLink::class);
    }
}
