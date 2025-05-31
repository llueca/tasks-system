<?php
declare(strict_types=1);

namespace App\Shared\Security;

use App\Users\Domain\Repositories\UserRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class EmailVerifier
{
    public function __construct(private readonly VerifyEmailHelperInterface $verifyEmailHelper, private readonly MailerInterface $mailer, private readonly UserRepository $userRepository)
    {
    }

    public function sendEmailConfirmation(string $emailToVerify, TemplatedEmail $email): void
    {
        $signatureComponents = $this->verifyEmailHelper->generateSignature(
            $emailToVerify,
            ['token' => $token],
            $toEmail
        );
    }

    public function verifyToken(string $token): bool
    {
        // Logic to verify the token
        // This could involve checking the token against a database or cache
        return true; // Placeholder for actual verification logic
    }
}
