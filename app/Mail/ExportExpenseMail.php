<?php

namespace App\Mail;

use App\Filament\Resources\ExpenseResource\ViewModels\ExpenseViewModel;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\{Address, Content, Envelope};
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class ExportExpenseMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Collection $expenses;
    public array $formData;
    public string $email;

    public function __construct($expenses, $formData)
    {
        $this->expenses = $expenses;
        $this->formData = $formData;
        $this->email = $formData['email'];
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            to: $this->email,
            subject: trans('expense.report', [
                'date' => ucfirst(Carbon::parse($this->formData['start_date'])->translatedFormat('F Y')),
            ]),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.expense_report_mail',
            with: (new ExpenseViewModel($this->expenses, $this->formData))->toArray()
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
