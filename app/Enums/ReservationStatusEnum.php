<?php

namespace App\Enums;

enum ReservationStatusEnum: string
{
    case PENDING    = 'pending';
    case CONFIRMED    = 'confirmed';
    case CANCELLED    = 'cancelled';
    case CHECKEDIN    = 'checked-in';
    case CHECKEDOUT    = 'checked-out';
}