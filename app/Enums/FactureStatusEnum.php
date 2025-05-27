<?php

namespace App\Enums;

enum FactureStatusEnum: string
{
    case UNPAID    = 'unpaid';
    case PAID       = 'paid';
}