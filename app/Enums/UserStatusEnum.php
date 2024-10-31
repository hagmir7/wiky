<?php

namespace App\Enums;

enum UserStatusEnum: int
{
    case Active = 0;
    case Suspend = 1;
}
