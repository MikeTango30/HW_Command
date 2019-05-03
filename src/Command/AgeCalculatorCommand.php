<?php

namespace App\Command;

use App\AgeCalculator\AgeManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCalculatorCommand extends Command
{
    protected static $defaultName = 'app:age:calculator';

    private $ageManager;

    /**
     * AgeCalculatorCommand constructor.
     * @param AgeManager $ageManager
     */
    public function __construct(AgeManager $ageManager)
    {
        $this->ageManager = $ageManager;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Calculate age')
            ->addArgument('birthday', InputArgument::REQUIRED, 'Enter date of Birth')
            ->addOption('adult', null, InputOption::VALUE_NONE, 'check if adult')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('birthday');

        $age = $this->ageManager->getAge($arg1);

        if ($input->getOption('adult')) {
            if (!$this->ageManager->identifyIfAdult($age)) {
                $io->note(sprintf('I am '.$age.' years old'));
                $io->warning('Am I an adult? ---- NO!!!');
            } else {
                $io->note(sprintf('I am '.$age.' years old'));
                $io->success('Am I an adult? ---- YES!!');
            }
        }

        $io->note(sprintf('I am '.$age.' years old'));
    }
}
