<?php
namespace AppBundle\Command;

use AppBundle\Service\Solver;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SolverCommand extends Command
{
    protected static $defaultName = 'app:solver';
    private $solverService = null;

    public function __construct(Solver $solverService, $name = null)
    {
        parent::__construct($name);
        $this->solverService = $solverService;
    }
    protected function configure()
    {
        $this->addArgument('input', InputArgument::OPTIONAL, 'Input');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while($f = fgets(STDIN)){
            $output->writeln($this->solverService->getSolution((int) $f));
        }
    }
}