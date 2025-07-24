<?php

declare(strict_types=1);

namespace App\Pipes;

use App\Mail\ExportExpenseMail;
use Illuminate\Support\Facades\Mail;

class SendExportMailPipe
{
    public function handle($data, \Closure $next)
    {
        if ($data['expenses']->isNotEmpty()) {
            Mail::send(new ExportExpenseMail($data['expenses'], $data));
        }

        return $next($data);
    }
}
