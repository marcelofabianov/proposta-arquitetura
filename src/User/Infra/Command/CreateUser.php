<?php

declare(strict_types=1);

namespace App\User\Infra\Command;

use App\Core\Entity\Audit;
use App\Core\GetContainer;
use App\Core\ValueObject\Email;
use App\Core\ValueObject\Password;
use App\Core\ValueObject\Uuid;
use App\User\Application\Interfaces\IUserService;
use App\User\Domain\Entity\Dto\CreateUserDto;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateUser extends Command
{
    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::REQUIRED, 'The name of the user')
            ->addArgument('email', InputArgument::REQUIRED, 'The email of the user')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user');
    }

    /**
     * @throws \App\Core\Exceptions\Interfaces\IValueObjectException
     * @throws \DI\NotFoundException
     * @throws \DI\DependencyException
     * @throws \App\Core\Exceptions\Interfaces\IPasswordException
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');

        $dto = new CreateUserDto(
            id: Uuid::random(),
            name: $name,
            email: Email::create($email),
            password: Password::create($password),
            audit: Audit::create(),
        );

        $containerBuilder = GetContainer::get();
        $container = $containerBuilder->build();

        /** @var IUserService $userService */
        $userService = $container->get(IUserService::class);
        $user = $userService->createNewUser($dto);

        $output->writeln(json_encode($user->toArray(), JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));

        return Command::SUCCESS;
    }
}
