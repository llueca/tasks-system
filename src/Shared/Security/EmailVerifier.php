<?php
declare(strict_types=1);

namespace App\Shared\Security;

use App\Users\Domain\Entities\User;
use App\Users\Domain\Repositories\UserRepository;
use App\Users\Domain\ValueObjects\EmailAddress;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class EmailVerifier
{
    public function __construct(private readonly VerifyEmailHelperInterface $verifyEmailHelper, private readonly MailerInterface $mailer, private readonly UserRepository $userRepository)
    {
    }

    public function sendEmailConfirmation(string $emailToVerify, TemplatedEmail $email): void
    {
        $user = $this->userRepository->getByEmail(EmailAddress::fromString($emailToVerify));
        $signatureComponents = $this->verifyEmailHelper->generateSignature($emailToVerify, (string) $user->id, (string) $user->email);

        $context = $email->getContext();
        $context['signedUrl'] = $signatureComponents->getSignedUrl();
        $context['expiresAtMessageKey'] = $signatureComponents->getExpirationMessageKey();
        $context['expiresAtMessageData'] = $signatureComponents->getExpirationMessageData();

        $email->context($context);

        $this->mailer->send($email);
    }

    public function verifyToken(Request $request, User $user): bool
    {
        $this->verifyEmailHelper->validateEmailConfirmationFromRequest($request, (string) $user->id, (string) $user->email);
    }
}
