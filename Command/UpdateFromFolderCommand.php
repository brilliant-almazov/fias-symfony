<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Symfony\LiquetsoftFiasBundle\Command;

use Liquetsoft\Fias\Component\Pipeline\Pipe\Pipe;
use Liquetsoft\Fias\Component\Pipeline\State\ArrayState;
use Liquetsoft\Fias\Component\Pipeline\Task\Task;
use SplFileInfo;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Команда, которая запускает обновление ФИАС из xml файлов,
 * сохраненных на локальном диске.
 */
class UpdateFromFolderCommand extends Command
{
    protected static $defaultName = 'liquetsoft:fias:update_from_folder';

    protected Pipe $pipeline;

    public function __construct(Pipe $pipeline)
    {
        $this->pipeline = $pipeline;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Updates version of FIAS from set folder.')
            ->addArgument('folder', InputArgument::REQUIRED, 'Path to folder on local system with FIAS xmls.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $folder = $input->getArgument('folder');
        if (\is_array($folder)) {
            $folder = reset($folder);
        }
        $folder = (string) $folder;

        $io->note("Updating version of FIAS from '{$folder}' folder.");

        $state = new ArrayState();
        $state->setAndLockParameter(Task::EXTRACT_TO_FOLDER_PARAM, new SplFileInfo($folder));
        $this->pipeline->run($state);

        $io->success("FIAS updated from '{$folder}' folder.");

        return 0;
    }
}
