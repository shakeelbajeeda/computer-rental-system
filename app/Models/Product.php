<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "category",
        "title",
        "brand",
        "per_hour_rate",
        "os",
        "display_size",
        "no_of_usb_ports",
        "no_of_hdmi_ports",
        "ram",
        "security_deposit",
        "insurance_amount",
        "image",
        "user_id",
        "is_rented",
    ];
}
